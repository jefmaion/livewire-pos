<?php

namespace App\Livewire\Actions;

use App\Models\Order;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Support\Str;

class PrintOrder
{
    public static function run(Order $order)
    {
        $connector = new WindowsPrintConnector("smb://localhost/POS-58");
        $printer = new Printer($connector);

        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("CAFETERIA DA IGREJA\n");
        if(!empty($order->table)) {
            $printer->text("MESA: " . $order->table . "\n");
        }

        if(!empty($order->customer)) {
            $printer->text("CLIENTE: " . $order->customer . "\n");
        }
        $printer->text("Pedido Nº: " . $order->orderCode() . "\n");
        $printer->text(date('d/m/Y H:i', strtotime($order->created_at)) . "\n");

        $printer->text(Str::repeat('-', 32) . "\n");


        $printer->setJustification(Printer::JUSTIFY_LEFT);
        foreach ($order->items as $item) {
            $printer->text("{$item->quantity}x {$item->product->name} \n");
            if(!empty($item->description)) {
                $printer->text('    *'.$item->description);
                $printer->feed();
            }
        }
        $printer->text(Str::repeat('-', 32) . "\n");

        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text("Total: R$ " . usToBrl($order->value) . "\n");
        $printer->text("\n");

        $printer->text(Str::repeat('-', 32) . "\n");
        $printer->cut();
        $printer->close();
    }
}
