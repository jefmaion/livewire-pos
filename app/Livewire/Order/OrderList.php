<?php

namespace App\Livewire\Order;

use App\Livewire\Actions\PrintOrder;
use App\Livewire\Pos\PosMain;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public $selectedOrder;
    public $status;

    public function render()
    {
        return view('livewire.order.order-list', [
            'orders' => Order::orderBy('created_at', 'desc')->paginate(5),
            'statuses' => Status::all()
        ]);
    }

    public function saveStatus($id) {
        $this->selectedOrder->update(['status_id' => $id]);
        $this->dispatch('close-status');
    }

    public function showStatus(Order $order) {
        $this->selectedOrder = $order;
         $this->dispatch('show-status');
    }

    public function print(Order $order) {
        return PrintOrder::run($order);
    }

    public function showItems(Order $order) {
        $this->selectedOrder = $order;
        $this->dispatch('open-modal');
    }
}
