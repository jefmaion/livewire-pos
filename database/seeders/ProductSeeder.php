<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nomes = [
            'Café Expresso',
            'Café com Leite',
            'Latte',
            'Cappuccino',
            'Mocha',
            'Americano',
            'Macchiato',
            'Affogato',
            'Chá Preto',
            'Chá Verde',
            'Chá de Camomila',
            'Chá de Hibisco',
            'Pão de Queijo',
            'Croissant',
            'Bolo de Chocolate',
            'Bolo de Cenoura',
            'Brownie',
            'Muffin de Blueberry',
            'Cookies de Chocolate',
            'Donut de Morango',
            'Donut de Chocolate',
            'Torrada com Manteiga',
            'Sanduíche Natural',
            'Toast com Abacate',
            'Brigadeiro',
            'Beijinho',
            'Quindim',
            'Torta de Limão',
            'Torta de Maçã',
            'Suco de Laranja',
            'Suco de Maçã',
            'Smoothie de Frutas Vermelhas',
            'Frappuccino de Caramelo',
            'Água Mineral',
            'Refrigerante de Cola',
            'Refrigerante de Guaraná',
            'Chocolate Quente',
            'Sorvete de Baunilha',
            'Sorvete de Morango',
            'Tapioca com Queijo',
            'Empada de Frango',
            'Empada de Palmito',
            'Coxinha Tradicional',
            'Esfirra de Carne',
            'Pastel de Queijo',
            'Crepe de Chocolate',
            'Churros com Doce de Leite',
            'Salada de Frutas',
            'Açaí na Tigela',
            'Iogurte com Granola',
            'Pudim de Leite Condensado',
            'Cheesecake de Frutas Vermelhas',
            'Panqueca Americana',
            'Waffle com Mel',
            'Bagel com Cream Cheese',
            'Biscoito de Polvilho',
            'Suco Detox',
            'Croissant Integral',
            'Espresso com Chantilly',
            'Latte Gelado',
            'Muffin de Banana',
            'Wrap de Frango',
            'Wrap Vegetariano',
            'Smoothie de Manga',
            'Milkshake de Chocolate',
            'Milkshake de Morango',
            'Chá de Hortelã',
            'Chá Mate Gelado',
            'Mini Pizza',
            'Donut de Baunilha',
            'Pastel de Carne',
            'Pastel de Pizza',
            'Esfirra de Frango',
            'Pão Integral com Ovo',
            'Panqueca de Aveia',
            'Quiche de Alho-Poró',
            'Torrada com Geleia',
            'Bolo de Laranja',
            'Bolo de Milho',
            'Sorvete de Chocolate',
            'Sorvete de Coco',
            'Açaí com Banana',
            'Chá Branco',
            'Café Descafeinado',
            'Latte com Baunilha',
            'Sanduíche de Atum',
            'Torta de Morango',
            'Waffle com Frutas',
            'Muffin de Chocolate Branco',
            'Croissant com Presunto',
            'Empada de Camarão',
            'Suco de Abacaxi',
            'Milkshake de Baunilha',
            'Café Gelado',
            'Coxinha Vegana',
            'Mini Churros',
            'Panqueca de Banana',
            'Crepe de Frutas',
            'Toast com Ovo Pochê',
            'Wrap de Salmão',
            'Smoothie de Abacate',
            'Cookies Integrais'
        ];

        $data = categoryData();

        $produtos = [];

        foreach ($data as $i => $item) {

            $category = Category::create(['name' => $item['name']]);

            foreach($item['products'] as $cat => $prod) {
                $prod['category_id'] = $category->id;
                Product::create($prod);
            }
        }
    }
}
