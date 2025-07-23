<?php

namespace App\Livewire\Forms\Product;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{

    public Product $product;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    #[Validate('required', message: 'Digite o nome do produto', onUpdate:false)]
    public $name;

    #[Validate('required', message: 'Digite a quantidade', onUpdate:false)]
    #[Validate('numeric', message: 'Digite apenas numeros', onUpdate:false)]
    public $quantity;

    #[Validate('required', message: 'Digite o valor do produto', onUpdate:false)]
    public $value;

    public $image;

    public $enabled;
    public $min;
    public $sell_no_stock;
    public $description;


    public function populate(?Product $product) {
        $this->product = $product;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->value = usToBrl($product->value);
        $this->enabled = ($product->enabled == 1);
        $this->category_id = $product->category_id;
        $this->description = $product->description;
        $this->image = 'image';
        $this->min = $product->min;
        $this->sell_no_stock = ($product->sell_no_stock == 1);
    }

    public function save()
    {
        $this->validate();
        $data = $this->prepare();

        // dd($data);

        if(isset($this->product)) {
            return $this->update($data);
        }

        return Product::create($data);

    }

    public function update($data) {
        return $this->product->update($data);
    }

    private function prepare() {
        $data = $this->except(['product']);
        $data['value'] = brlToUs($data['value']);
        return $data;
    }
}
