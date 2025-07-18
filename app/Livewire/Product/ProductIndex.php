<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $search='';
    public $id;

    #[Validate('required', message: 'Por favor, digite o nome do produto')]
    public $name = '';
    public $value;
    public $quantity;
    public $enabled= false;
    public $description;

    #[Validate('required', message: 'Por favor, selecione a categoria')]
    public $categoryId;

    public $sortField='id';
    public $sortDirection = 'desc';

    public $action="storeProduct";


















    public function createProduct() {
        // $this->resetData();
        // $this->action = 'storeProduct';
        // $this->dispatch('abrir-modal');

        dd('aop');
    }



    public function storeProduct() {


        $this->validate();

        Product::create([
            'name' => $this->name,
            'value' => $this->value,
            'quantity' => $this->quantity,
            'enabled' => 1,
            'description' => $this->description,
            'category_id' => $this->categoryId
        ]);

        $this->dispatch('close-modal');

        session()->flash('success', 'Produto atualizado com sucesso!');
    }

    public function editProduct(Product $product) {

        $this->id = $product->id;
        $this->name = $product->name;
        $this->value = $product->value;
        $this->quantity = $product->quantity;
        $this->enabled = $product->enabled;
        $this->description = $product->description;
        $this->categoryId = $product->category_id;


        $this->action = 'updateProduct';
        $this->dispatch('abrir-modal');
    }

    public function deleteProduct(Product $product) {
        $product->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetData() {
        $this->id = null;
        $this->name = null;
        $this->value = null;
        $this->quantity = null;
        $this->enabled = null;
        $this->categoryId=null;

        $this->search= null;
        $this->description=null;
    }

    public function changeStatus(Product $product) {
        $product->update([
            'enabled' => ($product->enabled == 1) ? 0 : 1
        ]);
    }

    public function updateProduct() {

        $this->validate([
            'name' => 'required|min:3',
        ]);

        $product = Product::find($this->id);

        $product->update([
            'name' => $this->name,
            'value' => $this->value,
            'quantity' => $this->quantity,
            'enabled' => (bool) $this->enabled,
            'description' => $this->description,
            'category_id' => $this->categoryId
        ]);

        // session()->flash('message', 'Produto atualizado com sucesso!');
        $this->dispatch('alert', [
            'message' => 'Produto atualizado com sucesso!',
            'type' => 'danger'
        ]);

        $this->dispatch('close-modal');
    }

    public function sort(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {

        return view('livewire.product.product-index');
    }


}
