<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\Product\ProductForm;
use App\Models\Product as ModelsProduct;
use App\Traits\Alerts;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{

    use WithPagination;
    use WithFileUploads;
    use Alerts;

    public ProductForm $form;
    public $search='';
    public $isEdit=false;

    public function create() {
        $this->reset();
        $this->resetValidation();
        $this->dispatch('open-modal');
    }

    public function edit($id) {
        $this->isEdit = true;
        $product      = ModelsProduct::find($id);
        
        $this->form->populate($product);
        $this->dispatch('open-modal');
    }

    public function save() {
        $this->form->save();
        $this->reset();
        $this->dispatch('close-modal');
        $this->alert('Registro alterado com sucesso');
        session()->flash('alert', [
        'type' => 'success',
        'message' => 'Produto salvo com sucesso!'
    ]);
        
    }

    public function render()
    {
        return view('livewire.product.product', [
              'products' => ModelsProduct::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('value', 'like', '%' . $this->search . '%')
                        ->paginate(5)
        ]);
    }
}
