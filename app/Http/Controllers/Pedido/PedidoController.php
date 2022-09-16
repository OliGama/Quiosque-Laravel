<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoController extends Controller
{
    public function index()
    {
        return  view('pedidos.index');
    }

    public function create(Request $request, $id)
    {
        $mesa = Mesa::find($id);

        $pedido = Pedido::create([
            'mesa_id' => $mesa->id
        ]);



        return redirect()->route('pedidos.show', $pedido);
    }

    public function show($mesa_id)
    {
        $mesa = Mesa::find($mesa_id);
        $pedido = Pedido::where('mesa_id', $mesa_id)->where('finalizado', 0)->first();
        $allProdutos = Produto::all();
        return view('pedidos.show', compact('pedido', 'allProdutos', 'mesa_id'));
    }

    public function edit( $mesa_id)
    {

        $mesa = Mesa::find($mesa_id);

        if (!$mesa) {
            return back()->with('warning', $mesa->numero.' não esta cadastrada');
        }
        if ($mesa->ocupada == 0) {
            return back()->with('warning', $mesa->numero.' esta fechada');
        }

        $pedido = Pedido::where('mesa_id', $mesa_id)->where('finalizado', 0)->first();

        if (!$pedido) {
            return back()->with('warning', $mesa->numero.' ainda não tem pedidos');
        }
        if ($pedido->finalizado == 1) {
            return back()->with('warning', 'Mesa não tem pedido');
        }

        $produto = Produto::all();

        return view('pedidos.edit', [
            'pedido' => $pedido,
            'allProdutos' => Produto::all(),
            'mesa_id' => $mesa
        ]);
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->update(['ocupada' => false]);

        return redirect()->route('mesas.index');
    }
}
