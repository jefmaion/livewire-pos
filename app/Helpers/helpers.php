<?php


function usToBrl($float) {
    return number_format($float, 2, ",", ".");
}

function brlToUs($float) {
    return str_replace(",", ".", str_replace('.', "", $float));
}

function color() {
    return 'brown';
}


function categoryData() {
    return [
    [
        'name' => 'Cafés/Chás',
        'products' => [
            ['name' => 'Espresso', 'description' => 'Espresso feito com ingredientes frescos e selecionados.', 'quantity' => 13, 'value' => 13.81, 'enabled' => true],
            ['name' => 'Café com Leite', 'description' => 'Café com Leite feito com ingredientes frescos e selecionados.', 'quantity' => 12, 'value' => 12.25, 'enabled' => false],
            ['name' => 'Cappuccino', 'description' => 'Cappuccino feito com ingredientes frescos e selecionados.', 'quantity' => 46, 'value' => 12.76, 'enabled' => false],
            ['name' => 'Latte', 'description' => 'Latte feito com ingredientes frescos e selecionados.', 'quantity' => 41, 'value' => 12.44, 'enabled' => true],
            ['name' => 'Mocha', 'description' => 'Mocha feito com ingredientes frescos e selecionados.', 'quantity' => 29, 'value' => 9.52, 'enabled' => true],
            ['name' => 'Macchiato', 'description' => 'Macchiato feito com ingredientes frescos e selecionados.', 'quantity' => 19, 'value' => 19.88, 'enabled' => true],
            ['name' => 'Americano', 'description' => 'Americano feito com ingredientes frescos e selecionados.', 'quantity' => 22, 'value' => 23.31, 'enabled' => false],
            ['name' => 'Affogato', 'description' => 'Affogato feito com ingredientes frescos e selecionados.', 'quantity' => 44, 'value' => 22.37, 'enabled' => true],
            ['name' => 'Café Gelado', 'description' => 'Café Gelado feito com ingredientes frescos e selecionados.', 'quantity' => 10, 'value' => 15.9, 'enabled' => false],
            ['name' => 'Café Coado', 'description' => 'Café Coado feito com ingredientes frescos e selecionados.', 'quantity' => 6, 'value' => 8.94, 'enabled' => true],
            ['name' => 'Chá de Camomila', 'description' => 'Chá de Camomila feito com ingredientes frescos e selecionados.', 'quantity' => 17, 'value' => 12.2, 'enabled' => true],
            ['name' => 'Chá Verde', 'description' => 'Chá Verde feito com ingredientes frescos e selecionados.', 'quantity' => 25, 'value' => 22.5, 'enabled' => true],
            ['name' => 'Chá Preto', 'description' => 'Chá Preto feito com ingredientes frescos e selecionados.', 'quantity' => 26, 'value' => 17.07, 'enabled' => false],
            ['name' => 'Chá de Hortelã', 'description' => 'Chá de Hortelã feito com ingredientes frescos e selecionados.', 'quantity' => 14, 'value' => 8.42, 'enabled' => true],
            ['name' => 'Chá de Erva-doce', 'description' => 'Chá de Erva-doce feito com ingredientes frescos e selecionados.', 'quantity' => 27, 'value' => 14.64, 'enabled' => true],
            ['name' => 'Chá de Hibisco', 'description' => 'Chá de Hibisco feito com ingredientes frescos e selecionados.', 'quantity' => 17, 'value' => 6.86, 'enabled' => true],
            ['name' => 'Chá de Gengibre', 'description' => 'Chá de Gengibre feito com ingredientes frescos e selecionados.', 'quantity' => 13, 'value' => 7.1, 'enabled' => false],
            ['name' => 'Chá de Canela', 'description' => 'Chá de Canela feito com ingredientes frescos e selecionados.', 'quantity' => 2, 'value' => 10.01, 'enabled' => false],
            ['name' => 'Chá Branco', 'description' => 'Chá Branco feito com ingredientes frescos e selecionados.', 'quantity' => 34, 'value' => 15.35, 'enabled' => false],
            ['name' => 'Chá Mate', 'description' => 'Chá Mate feito com ingredientes frescos e selecionados.', 'quantity' => 10, 'value' => 8.56, 'enabled' => true],
        ],
    ],

    [
        'name' => 'Sucos',
        'products' => [
            ['name' => 'Suco de Laranja', 'description' => 'Suco de Laranja feito com ingredientes frescos e selecionados.', 'quantity' => 16, 'value' => 14.92, 'enabled' => true],
            ['name' => 'Suco de Uva', 'description' => 'Suco de Uva feito com ingredientes frescos e selecionados.', 'quantity' => 20, 'value' => 11.87, 'enabled' => true],
            ['name' => 'Suco de Maracujá', 'description' => 'Suco de Maracujá feito com ingredientes frescos e selecionados.', 'quantity' => 22, 'value' => 13.65, 'enabled' => true],
            ['name' => 'Suco de Abacaxi', 'description' => 'Suco de Abacaxi feito com ingredientes frescos e selecionados.', 'quantity' => 31, 'value' => 15.28, 'enabled' => false],
            ['name' => 'Suco Verde', 'description' => 'Suco Verde feito com ingredientes frescos e selecionados.', 'quantity' => 9, 'value' => 7.42, 'enabled' => true],
            ['name' => 'Suco de Morango', 'description' => 'Suco de Morango feito com ingredientes frescos e selecionados.', 'quantity' => 25, 'value' => 12.55, 'enabled' => true],
            ['name' => 'Suco de Limão', 'description' => 'Suco de Limão feito com ingredientes frescos e selecionados.', 'quantity' => 33, 'value' => 9.22, 'enabled' => false],
            ['name' => 'Suco de Manga', 'description' => 'Suco de Manga feito com ingredientes frescos e selecionados.', 'quantity' => 11, 'value' => 10.5, 'enabled' => true],
            ['name' => 'Suco de Acerola', 'description' => 'Suco de Acerola feito com ingredientes frescos e selecionados.', 'quantity' => 18, 'value' => 13.34, 'enabled' => true],
            ['name' => 'Suco Detox', 'description' => 'Suco Detox feito com ingredientes frescos e selecionados.', 'quantity' => 12, 'value' => 15.63, 'enabled' => false],
        ],
    ],
    [
        'name' => 'Tortas e Doces',
        'products' => [
            ['name' => 'Torta de Limão', 'description' => 'Torta com recheio cremoso de limão', 'quantity' => 10, 'value' => 7.50, 'enabled' => true],
            ['name' => 'Cheesecake', 'description' => 'Torta de queijo com calda de frutas', 'quantity' => 8, 'value' => 9.00, 'enabled' => true],
            ['name' => 'Brownie', 'description' => 'Bolo de chocolate denso e úmido', 'quantity' => 12, 'value' => 6.50, 'enabled' => true],
            ['name' => 'Torta Holandesa', 'description' => 'Base de biscoito com creme e chocolate', 'quantity' => 10, 'value' => 8.50, 'enabled' => true],
            ['name' => 'Tiramisu', 'description' => 'Doce italiano com café e mascarpone', 'quantity' => 6, 'value' => 9.50, 'enabled' => true],
            ['name' => 'Bolo de Cenoura', 'description' => 'Com cobertura de chocolate', 'quantity' => 10, 'value' => 5.50, 'enabled' => true],
            ['name' => 'Pudim de Leite', 'description' => 'Doce tradicional brasileiro', 'quantity' => 9, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Trufa de Chocolate', 'description' => 'Bombom artesanal recheado', 'quantity' => 20, 'value' => 3.50, 'enabled' => true],
            ['name' => 'Palha Italiana', 'description' => 'Chocolate com biscoito', 'quantity' => 15, 'value' => 4.00, 'enabled' => true],
            ['name' => 'Doce de Leite', 'description' => 'Pedaços servidos gelados', 'quantity' => 10, 'value' => 3.00, 'enabled' => true],
        ]
    ],

    [
        'name' => 'Bolos',
        'products' => [
            ['name' => 'Bolo de Cenoura', 'description' => 'Com cobertura de chocolate.', 'quantity' => 50, 'value' => 8.00, 'enabled' => true],
            ['name' => 'Bolo de Chocolate', 'description' => 'Massa rica em cacau.', 'quantity' => 50, 'value' => 9.00, 'enabled' => true],
            ['name' => 'Bolo de Laranja', 'description' => 'Com suco natural da fruta.', 'quantity' => 50, 'value' => 7.50, 'enabled' => true],
            ['name' => 'Bolo Red Velvet', 'description' => 'Massa vermelha com cobertura de cream cheese.', 'quantity' => 50, 'value' => 10.00, 'enabled' => true],
            ['name' => 'Bolo de Coco', 'description' => 'Com leite de coco e coco ralado.', 'quantity' => 50, 'value' => 8.00, 'enabled' => true],
            ['name' => 'Bolo de Fubá', 'description' => 'Tradição brasileira.', 'quantity' => 50, 'value' => 7.00, 'enabled' => true],
            ['name' => 'Bolo de Banana', 'description' => 'Com pedaços de banana.', 'quantity' => 50, 'value' => 7.50, 'enabled' => true],
            ['name' => 'Bolo de Limão', 'description' => 'Com glacê de limão siciliano.', 'quantity' => 50, 'value' => 8.50, 'enabled' => true],
            ['name' => 'Bolo Mármore', 'description' => 'Mescla de chocolate e baunilha.', 'quantity' => 50, 'value' => 8.00, 'enabled' => true],
            ['name' => 'Bolo de Amendoim', 'description' => 'Com cobertura de paçoca.', 'quantity' => 50, 'value' => 9.00, 'enabled' => true],
        ],
    ],
    [
        'name' => 'Salgados',
        'products' => [
            ['name' => 'Coxinha', 'description' => 'Clássica coxinha de frango com catupiry.', 'quantity' => 100, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Empada', 'description' => 'Empada de frango cremosa.', 'quantity' => 100, 'value' => 5.50, 'enabled' => true],
            ['name' => 'Pão de Queijo', 'description' => 'Mineirinho e quentinho.', 'quantity' => 100, 'value' => 4.00, 'enabled' => true],
            ['name' => 'Esfiha', 'description' => 'Salgada de carne moída.', 'quantity' => 100, 'value' => 5.00, 'enabled' => true],
            ['name' => 'Quibe', 'description' => 'Frito, recheado com queijo.', 'quantity' => 100, 'value' => 5.00, 'enabled' => true],
            ['name' => 'Torta Salgada', 'description' => 'De legumes e frango.', 'quantity' => 100, 'value' => 7.00, 'enabled' => true],
            ['name' => 'Croissant de Presunto e Queijo', 'description' => 'Folhado recheado.', 'quantity' => 100, 'value' => 6.50, 'enabled' => true],
            ['name' => 'Bolinha de Queijo', 'description' => 'Frita e crocante.', 'quantity' => 100, 'value' => 5.00, 'enabled' => true],
            ['name' => 'Enroladinho de Salsicha', 'description' => 'Massa leve com recheio.', 'quantity' => 100, 'value' => 5.50, 'enabled' => true],
            ['name' => 'Pastel de Forno', 'description' => 'Assado e saudável.', 'quantity' => 100, 'value' => 6.00, 'enabled' => true],
        ],

    ],
    [
        'name' => 'Sanduíches',
        'products' => [
            ['name' => 'X-Burguer', 'description' => 'Hambúrguer com queijo e alface.', 'quantity' => 60, 'value' => 12.00, 'enabled' => true],
            ['name' => 'X-Salada', 'description' => 'Hambúrguer com queijo, alface e tomate.', 'quantity' => 50, 'value' => 13.00, 'enabled' => true],
            ['name' => 'X-Bacon', 'description' => 'Hambúrguer com queijo e bacon crocante.', 'quantity' => 55, 'value' => 14.00, 'enabled' => true],
            ['name' => 'Misto Quente', 'description' => 'Presunto e queijo quente.', 'quantity' => 70, 'value' => 8.00, 'enabled' => true],
            ['name' => 'Sanduíche Natural', 'description' => 'Pão integral com recheio leve.', 'quantity' => 40, 'value' => 10.00, 'enabled' => true],
            ['name' => 'Sanduíche de Frango', 'description' => 'Frango desfiado com maionese.', 'quantity' => 50, 'value' => 11.00, 'enabled' => true],
            ['name' => 'Sanduíche Vegano', 'description' => 'Com legumes grelhados.', 'quantity' => 30, 'value' => 12.00, 'enabled' => true],
            ['name' => 'Sanduíche de Atum', 'description' => 'Atum com maionese e alface.', 'quantity' => 40, 'value' => 13.00, 'enabled' => true],
            ['name' => 'Sanduíche de Carne Louca', 'description' => 'Carne desfiada temperada.', 'quantity' => 45, 'value' => 14.00, 'enabled' => true],
            ['name' => 'Sanduíche de Queijo', 'description' => 'Vários queijos derretidos.', 'quantity' => 50, 'value' => 11.00, 'enabled' => true],
        ],
    ],
    [
        'name' => 'Torradas',
        'products' => [
            ['name' => 'Torrada com Geleia', 'description' => 'Pão torrado com geleia de morango.', 'quantity' => 50, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Torrada com Manteiga', 'description' => 'Pão torrado com manteiga derretida.', 'quantity' => 60, 'value' => 5.50, 'enabled' => true],
            ['name' => 'Torrada com Queijo', 'description' => 'Pão torrado com queijo derretido.', 'quantity' => 40, 'value' => 7.00, 'enabled' => true],
            ['name' => 'Torrada com Patê', 'description' => 'Pão torrado com patê de atum.', 'quantity' => 45, 'value' => 7.50, 'enabled' => true],
            ['name' => 'Torrada com Mel', 'description' => 'Pão torrado com mel natural.', 'quantity' => 30, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Torrada Integral', 'description' => 'Pão integral torrado.', 'quantity' => 40, 'value' => 5.50, 'enabled' => true],
            ['name' => 'Torrada com Guacamole', 'description' => 'Pão torrado com guacamole.', 'quantity' => 25, 'value' => 8.00, 'enabled' => true],
            ['name' => 'Torrada com Pasta de Amendoim', 'description' => 'Pão torrado com pasta de amendoim.', 'quantity' => 30, 'value' => 6.50, 'enabled' => true],
            ['name' => 'Torrada com Tomate e Manjericão', 'description' => 'Pão torrado com tomate fresco e manjericão.', 'quantity' => 20, 'value' => 7.00, 'enabled' => true],
            ['name' => 'Torrada com Ovo Mexido', 'description' => 'Pão torrado com ovo mexido cremoso.', 'quantity' => 35, 'value' => 7.50, 'enabled' => true],
        ],
    ],
    [
        'name' => 'Bebidas Geladas',
        'products' => [
            ['name' => 'Refrigerante Lata', 'description' => 'Lata de 350ml.', 'quantity' => 200, 'value' => 5.00, 'enabled' => true],
            ['name' => 'Água Mineral', 'description' => '500ml.', 'quantity' => 300, 'value' => 3.00, 'enabled' => true],
            ['name' => 'Suco Natural', 'description' => 'Suco natural da fruta.', 'quantity' => 150, 'value' => 7.00, 'enabled' => true],
            ['name' => 'Chá Gelado', 'description' => 'Chá preparado e gelado.', 'quantity' => 100, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Limonada Suíça', 'description' => 'Limonada com leite condensado.', 'quantity' => 100, 'value' => 7.50, 'enabled' => true],
            ['name' => 'Milkshake de Baunilha', 'description' => 'Batido cremoso.', 'quantity' => 60, 'value' => 10.00, 'enabled' => true],
            ['name' => 'Milkshake de Chocolate', 'description' => 'Batido com chocolate.', 'quantity' => 60, 'value' => 10.00, 'enabled' => true],
            ['name' => 'Água de Coco', 'description' => 'Natural e refrescante.', 'quantity' => 80, 'value' => 6.00, 'enabled' => true],
            ['name' => 'Smoothie de Morango', 'description' => 'Bebida cremosa de morango.', 'quantity' => 50, 'value' => 9.00, 'enabled' => true],
            ['name' => 'Smoothie Verde', 'description' => 'Com couve, maçã e gengibre.', 'quantity' => 50, 'value' => 9.50, 'enabled' => true],
        ],
    ],
    // continue...
];

}
