<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\Product\ProductForm;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;

class ProductUpdate extends Component
{
    public ProductForm $form;



    #[On('edit-product')]
    public function edits($product) {
        // dd($product);
        // $this->form->populate($product);
        // $this->dispatch('open-modal');
    }

    public function save()
    {
        $this->form->store();
        return $this->redirect('product');
    }

    public function render()
    {
        return view('livewire.product.product-create');
    }
}
