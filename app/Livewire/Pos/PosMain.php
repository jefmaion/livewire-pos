<?php

namespace App\Livewire\Pos;

use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Traits\Alerts;
use Livewire\Component;
use Livewire\WithPagination;

class PosMain extends Component
{

    use WithPagination;
    use Alerts;

    public Product $product;

    public $search='';
    public $categoryId;
    public $grid="L";

    public $quantity=1;
    public $comments='';
    public $toGo=0;
    public $items=[];
    public $total;
    public $table;
    public $customer;
    public $payment;
    public $receive=0;
    public $change=0;
    

    public function grids($type) {
        $this->grid = $type;
        $this->resetPage();
    }

    public function category($id='') {
        $this->categoryId = $id;
        $this->resetPage();
    }

    public function setChange() {
        $receive  = (float) brlToUs($this->receive);

        if(empty($receive) || $receive == 0) {
            return;
        }

 

        $this->change = $receive - $this->total;

        // dd($this->receive, $this->total);
    }

    public function show(Product $product) {
        $this->quantity=1;
        $this->toGo = false;
        $this->comments=null;

        $this->product = $product;
        $this->dispatch('open-modal', modal:'modal-product');
    }

    public function setPayment($payment) {
        $this->payment = $payment;
    }

    public function setQuantity($n, $product=null) {

        $max = $this->product->quantity;

        if(empty($product)) {

            $this->quantity = $this->quantity + $n;

            if($this->quantity > $max) {
                $this->quantity--;
                return;
            }

            $this->quantity = ($this->quantity <= 0) ? 1 : $this->quantity;
            return;

        }

        $itemQtd = $this->items[$product]['quantity'];
        $itemQtd = $itemQtd + $n;

        if($itemQtd > $max) {
            $itemQtd--;
        }

        $this->items[$product]['quantity'] = $itemQtd;

        if($itemQtd <= 0) {
            $this->remove($product);
        }


        $this->setTotal();
    }

    public function setTotal() {
        $this->total=0;
        foreach($this->items as $k => $item) {
            $this->total = $this->total + ($item['quantity'] * $item['value']);
            $this->items[$k]['subtotal'] =$item['quantity'] * $item['value'];
        }
    }

    public function remove($id) {
        unset($this->items[$id]);
    }

    public function add($id) {

        $product = Product::find($id);

        if(isset($this->items[$id])) {
            $this->items[$id]['quantity']++;
        } else {
            $this->items[$id] = [
                'product'    => $product,
                'name' => $product->name,
                'product_id' => $id,
                'quantity'   => $this->quantity,
                'description'   => $this->comments,
                'value'      => $product->value,
                'subtotal' => $this->quantity * $product->value,
                'to_go'      => $this->toGo
            ];
        }


        $this->setTotal();
        $this->dispatch('close-modal', modal:'modal-product');
        $this->search="";


    }

    public function clear() {
        $this->items = [];
        $this->total = 0;
    }



    public function order() {

        if(empty($this->items)) {
            return $this->alert('Sua cesta está vazia!', 'danger');
        }

        if(empty($this->payment)) {
            return $this->alert('Selecione o pagamento', 'error');
        }

        $soldOut=[];
        foreach ($this->items as $item) {
            $prod = Product::find($item['product_id']);
            if($prod->quantity == 0) {
                $soldOut[] = $prod->name;
            }
        }

        if(!empty($soldOut)) {
            return $this->alert('Os produtos '. implode(",", $soldOut) . ' acabou!', 'error');
        }

        $order = Order::create([
            'table'    => $this->table,
            'customer' => $this->customer,
            'value'    => $this->total,
            'payments_id'  => $this->payment,
            'status_id' => 1
        ]);

         foreach ($this->items as $item) {
            unset($item['product']);
            $order->items()->create($item);
        }



        $this->reset();
        $this->resetPage();
        $this->dispatch('close-modal', modal:'modal-resume');
        $this->alert('Pedido Criado');

        // PrintOrder::run($order);
    }

    // #[Layout('components.layouts.navbar')]
    public function render()
    {
        return view('livewire.pos.pos-main', [
            'products' => $this->getData(),
            'categories' => Category::all(),
            'payments' => Payment::all()
        ]);
    }

    private function getData() {

        // if(!empty($this->search)) {
        //     $this->categoryId = '';
        // }

        $products = Product::where('enabled', 1)->where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc');

        if (!empty($this->categoryId)) {
            $products->where('category_id', $this->categoryId);
        }

        $pages = 5;

        if($this->grid == 'I') {
            $pages = 8;
        }

        return $products->paginate($pages);
    }

}
