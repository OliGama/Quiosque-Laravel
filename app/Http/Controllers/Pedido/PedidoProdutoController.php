<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\PedidoProdutoRequest;
use App\Models\{Pedido, Produto};
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    public function store(Pedido $pedido, PedidoProdutoRequest $request)
    {


        $pedido_produto = $pedido->produtos->where('id', $request->produto_id)->first();
        if ($pedido_produto) {
            $pedido_produto->pivot->update([
                'quantidade' => $pedido_produto->pivot->quantidade + $request->quantidade,
                'observacao' => $pedido_produto->pivot->observacao + $request->observacao,
            ]);
        } else {
            $pedido->produtos()->attach([$request->produto_id => [
                'quantidade' => $request->quantidade,
                'observacao' => $request->observacao
            ]]);
        }
        return back()->with('success', 'Pedido adicionado com sucesso!');
    }

    public function destroy(Pedido $pedido, Produto $produto)
    {
        $pedido->produtos()->detach($produto->id);
        return back()->with('success', 'Remoção do Pedido feita!');
    }

    public function update_mais(Pedido $pedido, Produto $produto)
    {

        $new_produto = $pedido->produtos()->where('id', $produto->id)->first();
        if ($new_produto) {
            $new_produto->pivot->update([
                'quantidade' => $new_produto->pivot->quantidade + 1
            ]);
        }
        return back()->with('success', 'Adicionado com sucesso!');
    }

    public function update_menos(Pedido $pedido, Produto $produto)
    {

        $new_produto = $pedido->produtos()->where('id', $produto->id)->first();
        if ($new_produto) {
            if ($new_produto->pivot->quantidade > 1) {
                $new_produto->pivot->update([
                    'quantidade' => $new_produto->pivot->quantidade - 1
                ]);
            } else {
                $pedido->produtos()->detach($new_produto->id);
            }
        }
        return back()->with('success', 'Removido com sucesso!');
    }
}
