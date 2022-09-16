<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Models\{Pedido, Produto};
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    public function store(Pedido $pedido, Request $request){


        $pedido_produto = $pedido->produtos->where('id', $request->produto_id)->first();
        if($pedido_produto){
            $pedido_produto->pivot->update([
                'quantidade' => $pedido_produto->pivot->quantidade + $request->quantidade
            ]);
        } else {
            $pedido->produtos()->attach([$request->produto_id => [
                'quantidade' => $request->quantidade
            ]]);
        }
        return back()->with('success', 'Pedido adicionado com sucesso!');
    }

    public function destroy(Pedido $pedido, Produto $produto){
        $pedido->produtos()->detach($produto->id);
        return back()->with('success', 'Remoção do Pedido feita!');
    }
}
