<?php

namespace App\View\Components\Common;

use App\Models\Payment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectPayment extends Component
{
    public $payments;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->payments = Payment::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.common.select-payment');
    }
}
