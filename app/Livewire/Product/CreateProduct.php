<?php

namespace App\Livewire\Product;

use Livewire\Component;

class CreateProduct extends Component
{
    public $showModal = false;

    protected $listeners = ['showModal' => 'open'];

     public function open()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.product.create-product');
    }
}
