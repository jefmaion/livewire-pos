<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\Product\ProductForm as ProductProductForm;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProductForm extends Component
{

    public ProductProductForm $form;

    public Product $product;

    public $name;

    #[On('create')]
    public function create() {
        $this->resetValidation();
        $this->dispatch('open-modal');
    }

    #[On('edit')]
    public function edit(Product $product) {
        $this->resetValidation();
        $this->product = $product;



        dd($this);
         $this->dispatch('open-modal');
    }

    public function save() {

        $this->validate();

        $this->form->store();

        $this->dispatch('close-modal');

    }

    public function render()
    {
        return view('livewire.product.product-form', [
             'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
