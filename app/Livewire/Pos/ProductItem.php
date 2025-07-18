<?php

namespace App\Livewire\Pos;

use App\Models\Product;
use Livewire\Component;

class ProductItem extends Component
{

    public Product $product;
    public $type;

    public function showDetails()
    {
        $this->dispatch('showProductModal', product: $this->product)->to(Pos::class); // direciona ao pai
    }

    public function render()
    {
        return view('livewire.pos.product-item');
    }

    public function show(Product $product) {
        $this->dispatch('showProductModal', product: $product)->to(Pos::class); // direciona ao pai
    }
}
