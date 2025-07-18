<?php

namespace App\Livewire\Pos;

use Livewire\Attributes\Modelable;
use Livewire\Component;

class Item extends Component
{

    public $item;
    public $quantity=1;
    public $total=0;

    public function render()
    {
        return view('livewire.pos.item');
    }

     public function dec() {
        $this->quantity--;
        $this->updateCart();
    }

     public function inc() {
        $this->quantity++;
        $this->updateCart();
    }

    public function removeItem($id) {
        $this->dispatch(
            'item-remove',
            id: $this->item['product_id'],
        );
    }

    public function updateCart() {

        if(empty($this->quantity)) return;
        $this->dispatch(
            'item-updated',
            id: $this->item['product_id'],
            qty: $this->quantity    // manda o novo valor
        );
    }
}
