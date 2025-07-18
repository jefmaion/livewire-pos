<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['name' => 'Cafés'],
            ['name' => 'Chás'],
            ['name' => 'Sucos'],
            ['name' => 'Lanches'],
            ['name' => 'Tortas'],
            ['name' => 'Doces'],
            ['name' => 'Salgados'],
            ['name' => 'Bolos'],
            ['name' => 'Bebidas Geladas'],
            ['name' => 'Sanduíches']
        ];

        foreach($categorias as $cat) {
            Category::create($cat);
        }
    }
}
