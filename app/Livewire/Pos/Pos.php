<?php

namespace App\Livewire\Pos;

use App\Models\Category;
use App\Models\Order;
use Livewire\Attributes\On;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

use Illuminate\Support\Str;


class Pos extends Component
{

    use WithPagination;

    public Product $product;
    public $search = '';
    public $quantity = 1;
    public $description = null;
    public $total;
    public $receive;
    public $change;
    public $payment;
    public $items = [];
    public $selectedProduct;
    public $show = 'icons';
    public $isMoney = false;
    public $table;
    public $customer;

    public $categoryId;


    public function list($type)
    {
        $this->show = $type;
    }

    #[On('showProductModal')]
    public function onShowProductModal(Product $product)
    {
        $this->selectedProduct = $product;
        $this->description = null;
        $this->dispatch('abrir-modal');
    }

    public function resetData()
    {
        $this->quantity = 1;
        $this->description = null;
        $this->total = 0;
        $this->payment = null;
        $this->selectedProduct = null;
        $this->table = null;
        $this->customer = null;
        $this->items = [];
        $this->receive = null;
    }

    #[On('item-updated')]
    public function updateItem(int $id, int $qty)
    {
        $this->items[$id]['quantity'] = $qty;
        $this->updateCart();
    }

    public function calculateChange()
    {
        if (empty($this->receive)) {
            $this->receive = $this->total;
            $this->change = null;
            return;
        }
        $this->change = $this->receive - $this->total;
    }

    public function setCategory($id = null)
    {
        $this->categoryId = $id;
        $this->resetPage();
    }

    #[On('refresh-produtos')]
    public function render()
    {



        $products = Product::where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc');

        if (!empty($this->categoryId)) {
            $products->where('category_id', $this->categoryId);
        }

        $pages = ($this->show == 'list') ? 6 : 8;

        return view('livewire.pos.pos', [
            'products' => $products->paginate($pages),
            'categories' => Category::all()
        ]);
    }

    public function pay()
    {

        if (count($this->items) == 0) {
            return $this->message('danger', 'Cesta vazia');
        }

        if (empty($this->payment)) {
            return $this->message('danger', 'Selecione o pagamento');
        }

        $this->dispatch('abrir-order');
    }

    private function message($type = "success", $message)
    {
        return $this->dispatch('alert', ['type' => $type, 'message' => $message]);
    }

    public function atualizarProdutos()
    {
        return;
    }

    public function createOrder()
    {




        $order = [
            'table'    => $this->table,
            'customer' => strtoupper($this->customer),
            'payment'  => $this->payment,
            'status' => 'Aguardando',
            'value' => $this->total
        ];

        $order = Order::create($order);
        foreach ($this->items as $item) {
            unset($item['name']);
            Product::where('id', $item['product_id'])->decrement('quantity', $item['quantity']);
            $order->items()->create($item);
        }

        $this->resetPage();
        $this->dispatch('close-order');
        $this->resetData();

        $connector = new WindowsPrintConnector("smb://localhost/POS-58");
        $printer = new Printer($connector);

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("CAFETERIA DA IGREJA\n");
        if(!empty($order->table)) {
            $printer->text("MESA: " . $order->table . "\n");
        }
        $printer->text("Pedido Nº: " . $order->id . "\n");
        $printer->text(date('d/m/Y H:i') . "\n");

        $printer->text(Str::repeat('-', 32) . "\n");


        $printer->setJustification(Printer::JUSTIFY_LEFT);
        foreach ($order->items as $item) {
            $printer->text("{$item->quantity}x {$item->product->name} \n");
            if(!empty($item->description)) {
                $printer->text('    *'.$item->description);
                $printer->feed();
            }
        }
        $printer->text(Str::repeat('-', 32) . "\n");

        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("Total: R$ " . usToBrl($order->value) . "\n");
        $printer->cut();
        $printer->close();

        $this->dispatch('alert', [
            'message' => 'Pedido enviado!',
            'type' => 'success'
        ]);
    }

    #[On('item-remove')]
    public function removeItem($id)
    {
        unset($this->items[$id]);
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->total = 0;
        foreach ($this->items as $item) {
            $this->total = $this->total + ($item['quantity'] * $item['value']);
        }
        $this->receive = $this->total;
    }

    public function addItem(Product $product)
    {
        $this->items[$product->id] = [
            'product_id' => $product->id,
            'value' => $product->value,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'name' => $product->name
        ];

        $this->updateCart();
        $this->dispatch('close-modal');
    }

    public function setMoney()
    {
        $this->isMoney = ($this->payment == 'D');
    }

    public function setReceive()
    {
        $this->change = $this->receive - $this->total;
    }
}
