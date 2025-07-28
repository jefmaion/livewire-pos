<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create(['name' => 'Pix', 'change' => 0]);
        Payment::create(['name' => 'Cartão de Crédito', 'change' => 0]);
        Payment::create(['name' => 'Cartão de Débito', 'change' => 0]);
        Payment::create(['name' => 'Dinheiro', 'change' => 1]);

    }
}
