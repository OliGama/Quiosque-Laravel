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
        //Bebidas
        Produto::create([
            'nome_produto' => 'Coca Cola',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Guarana',
            'tipo_produto' => 'Bebida',
            'preco' => '6.00'
        ]);
        Produto::create([
            'nome_produto' => 'Cerveja',
            'tipo_produto' => 'Bebida',
            'preco' => '5.00'
        ]);
        Produto::create([
            'nome_produto' => 'Caipirinha',
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
            'nome_produto' => 'Pastel de Frango',
            'tipo_produto' => 'Pastel',
            'preco' => '12.00'
        ]);


        //Porções
        Produto::create([
            'nome_produto' => 'Batata Frita',
            'tipo_produto' => 'Porcao',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Camarao',
            'tipo_produto' => 'Porcao',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Polenta',
            'tipo_produto' => 'Porcao',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Bacon',
            'tipo_produto' => 'Porcao',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Amendoim',
            'tipo_produto' => 'Porcao',
            'preco' => '15.00'
        ]);
    }
}
