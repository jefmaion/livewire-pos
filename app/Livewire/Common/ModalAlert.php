<?php

namespace App\Livewire\Common;

use Livewire\Component;
use Livewire\Attributes\On;

class ModalAlert extends Component
{

    public $message;
    public $type='success';

    #[On('modal-alert')]
    public function show($params=[]) {
        $this->message = $params['message'];
        $this->type = $params['type'];

        $this->dispatch('show-modal-alert');
    }

    public function render()
    {
        return view('livewire.common.modal-alert');
    }


}
