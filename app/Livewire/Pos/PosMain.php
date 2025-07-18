<?php

namespace App\Livewire\Pos;

use App\Models\Category;
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

    public function grids($type) {
        $this->grid = $type;
    }

    public function category($id='') {
        $this->categoryId = $id;
        $this->resetPage();
    }

    public function show(Product $product) {
        $this->quantity=1;
        $this->toGo = false;
        $this->comments=null;
        
        $this->product = $product;
        $this->dispatch('open-modal');
    }

    public function setQuantity($n, $product=null) {
        if(empty($product)) {
            $this->quantity = $this->quantity + $n;
            return;
        }

        $this->items[$product]['quantity'] = $this->items[$product]['quantity'] + $n;
        
    }

    public function add($id) {

        $product = Product::find($id);

        $this->items[$id] = [
            'product' => $product,
            'product_id' => $id,
            'quantity' => $this->quantity,
            'comments' => $this->comments,
            'to_go' => $this->toGo
        ];



        $this->dispatch('close-modal');
        $this->alert('Produto adicionado ao carrinho!');
    }

    public function render()
    {
        return view('livewire.pos.pos-main', [
            'products' => $this->getData(),
            'categories' => Category::all()
        ]);
    }

    private function getData() {

        if(!empty($this->search)) {
            $this->categoryId = '';
        }

        $products = Product::where('name', 'like', '%' . $this->search . '%')->orderBy('name', 'asc');

        if (!empty($this->categoryId)) {
            $products->where('category_id', $this->categoryId);
        }

        $pages = 5;

        if($this->grid == 'I') {
            $pages = 12;
        }

        return $products->paginate($pages);
    }
}
