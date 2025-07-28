<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.display')] 
class Display extends Component
{
    public $lastOrderDone = null;

    public function render()
    {
        $pedidoPronto = Order::where('status_id', 2)
            ->latest()
            ->first();

        if ($pedidoPronto && $pedidoPronto->orderCode() !== $this->lastOrderDone && $pedidoPronto->status !== "OK") {
            $this->lastOrderDone = $pedidoPronto->orderCode();
            $this->dispatch('show', orderId: $this->lastOrderDone);
        }

        $ordersPrepare = Order::where('status_id', 1)->orderBy('created_at', 'desc')->get();
        $ordersoK = Order::where('status_id', 2)->orderBy('updated_at', 'desc')->get();

        return view('livewire.order.display', [
            'preparing' =>  $ordersPrepare,
            'done' => $ordersoK
        ]);
    }
}
