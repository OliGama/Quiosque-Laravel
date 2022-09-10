<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'nome_produto' => 'Coca Cola',
            'tipo_produto' => 'Bebida',
            'preco' => '06.00'
        ]);
        Produto::create([
            'nome_produto' => 'Fanta Laranja',
            'tipo_produto' => 'Bebida',
            'preco' => '06.00'
        ]);
        Produto::create([
            'nome_produto' => 'Guaraná Jesus',
            'tipo_produto' => 'Bebida',
            'preco' => '06.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de flango',
            'tipo_produto' => 'Pastel',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de Quezo',
            'tipo_produto' => 'Pastel',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Pastel de Cane',
            'tipo_produto' => 'Pastel',
            'preco' => '15.00'
        ]);
        Produto::create([
            'nome_produto' => 'Porção de Cação',
            'tipo_produto' => 'Porcao',
            'preco' => '70.00'
        ]);
        Produto::create([
            'nome_produto' => 'Porção de Camarão',
            'tipo_produto' => 'Porcao',
            'preco' => '70.00'
        ]);
        Produto::create([
            'nome_produto' => 'Porção de Tilápia',
            'tipo_produto' => 'Porcao',
            'preco' => '70.00'
        ]);
    }
}
