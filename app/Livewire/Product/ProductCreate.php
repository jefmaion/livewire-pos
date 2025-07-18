<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\Product\ProductForm;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductCreate extends Component
{
    public ProductForm $form;
    public Product $product;



    #[On('create-product')]
    public function create() {
        $this->resetValidation();
        $this->dispatch('open-modal');
    }

    public function save()
    {

        $this->form->store();
        return $this->redirect('product');
    }

    public function render()
    {
        return view('livewire.product.product-form');
    }
}
