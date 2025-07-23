<?php

namespace App\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class Display extends Component
{
    public $lastOrderDone = null;

    public function render()
    {
        $pedidoPronto = Order::where('status', 'PRONTO')
            ->latest()
            ->first();

        if ($pedidoPronto && $pedidoPronto->orderCode() !== $this->lastOrderDone && $pedidoPronto->status !== "OK") {
            $this->lastOrderDone = $pedidoPronto->orderCode();

            // Emite evento JS
            // $this->dispatchBrowserEvent('pedido-pronto', [
            //     'numero' => $pedidoPronto->numero,
            // ]);



            $this->dispatch('show', orderId: $this->lastOrderDone);
        }

        $ordersPrepare = Order::where('status', 'EM PREPARAÇÃO')->get();
        $ordersoK = Order::where('status', 'PRONTO')->get();

        return view('livewire.order.display', [
            'preparing' =>  $ordersPrepare,
            'done' => $ordersoK
        ]);
    }
}
