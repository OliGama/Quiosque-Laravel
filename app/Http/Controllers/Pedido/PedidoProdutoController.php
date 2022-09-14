<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Models\{Pedido, Produto};
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    public function store(Pedido $pedido, Request $request){
        $produto = Produto::findOrFail($request->produto_id);

        $produto->pedidos()->attach($pedido->id);

        return back()->with('success', 'Pedido adicionado com sucesso!');
    }
}
