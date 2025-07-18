<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{

    use WithPagination;

    public $search;



    public function render()
    {
        return view('livewire.product.product-list',[
             'products' => Product::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('value', 'like', '%' . $this->search . '%')
                        // ->orderBy($this->sortField, $this->sortDirection)
                        ->paginate(5)
        ]);
    }
}
