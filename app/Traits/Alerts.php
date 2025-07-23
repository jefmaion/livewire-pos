<?php

namespace App\Traits;

trait Alerts {
    public function alert(string $message, string $type='success') {
        // return $this->dispatch('toastr', ['type' => $type, 'message' => $message]);
        return $this->alertModal($message, $type);
    }

    public function alertModal(string $message, string $type='success') {
        $type= ($type == 'error') ? 'danger' : $type;
        return $this->dispatch('modal-alert',  ['type' => $type, 'message' => $message]);
    }
}
