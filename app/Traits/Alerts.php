<?php

namespace App\Traits;

trait Alerts {
    public function alert(string $message, string $type='success') {
        return $this->dispatch('toastr', ['type' => $type, 'message' => $message]);
    }
}