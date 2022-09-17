<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Bebidas Refrigerante
        Produto::create([
            'nome_produto' => 'Coca Cola',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Coca Cola 0',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta Guarana',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta Guarana 0',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta Laranja',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta Uva',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Citrus',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Tônica',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Tônica 0',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Sprite Lemon Fresh',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Água',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Água com gas',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Água de Coco',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Energético',
            'tipo_produto' => 'Bebida',
            'preco' => '15.00'
        ]);

        // Bebidas Cerveja
        Produto::create([
            'nome_produto' => 'Cerveja Therezópolis 500 ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Therezópolis Whithbier 500 ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Therezópolis 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Eisenbahn 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Estrella Galícia 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Heineken 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Amstel 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Tiger 600ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Therezópolis Lata 350 ml',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Heineken Lata 350 ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Estrella Galícia Lata 350ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Amstel Lata 350ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Skol Lata 350ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Eisenbahn Lata 350 ml',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja Amstel Lata 350ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja 0 Estrella Galícia Tradicional Lata 350ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja 0 Estrella Galícia Tradicional LN 250ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja 0 Estrella Galícia LN Tostada 250ml',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja 0 Estrella Galícia LN Black 250ml',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);

        //Bebida Drink
        Produto::create([
            'nome_produto' => 'Caipirinha Limão Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Maracujá Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Abacaxi Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Morango Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Kiwi Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Pitanga Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Brasileirinha (Limão Maracujá) Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Limão Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Maracujá Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Abacaxi Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Morango Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Kiwi Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha Pitanga Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);

        Produto::create([
            'nome_produto' => 'Batida Limão Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Coco Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Maracujá Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Abacaxi Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Morango Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Kiwi Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Pitanga Pinga',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Coco Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Limão Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Maracujá Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Abacaxi Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Morango Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Kiwi Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Batida Pitanga Vodka',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Espanhola de Abacaxi',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Espanhola de Morango',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Limão c/ agua',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Maracujá c/ agua',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Abacaxi c/ agua',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Espanhola de Morango c/ agua',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Limão c/ Leite Condensado',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Maracujá c/ Leite Condensado',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Suco de Abacaxi c/ Leite Condensado',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Espanhola de Morango c/ Leite Condensado',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);

        //Pasteis
        Produto::create([
            'nome_produto' => 'Pastel de Carne',
            'tipo_produto' => 'Pastel',
            'preco' => '12.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de Queijo',
            'tipo_produto' => 'Pastel',
            'preco' => '12.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de Pizza',
            'tipo_produto' => 'Pastel',
            'preco' => '12.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de Carne com Queijo',
            'tipo_produto' => 'Pastel',
            'preco' => '12.00'
        ]);


        //Porções Diversas 
        Produto::create([
            'nome_produto' => 'Batata Frita',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Mandioca',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);

        Produto::create([
            'nome_produto' => 'Frango a Passarinho',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Salame',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);


         //Porções Peixes
        Produto::create([
            'nome_produto' => 'Camarao',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cação',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pescada',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Tilápia',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Porquinho',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Sororoca',
            'tipo_produto' => 'Porção',
            'preco' => '15.00'
        ]);
    }
}
