<?php

namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function show(Request $request) {
        $pedidos = Pedido::all();
        $produtos = Produto::find('id', 'nome_produto', 'tipo_produto', 'preco');
        // $pedidos_produtos = PedidoProduto::find('pedido_id', 'produdo_id', 'quantidade');
        dd($pedidos);
        return view('relatorio.show', [
            'pedidos' => $pedidos,
            'produtos' => $produtos
        ]);
    }
}
