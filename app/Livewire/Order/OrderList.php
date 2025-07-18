<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public $selectedOrder;

    public function render()
    {
        return view('livewire.order.order-list', [
            'orders' => Order::orderBy('created_at', 'desc')->paginate(5)
        ]);
    }

    public function showItems(Order $order) {
        $this->selectedOrder = $order;
        $this->dispatch('open-modal');
    }
}
