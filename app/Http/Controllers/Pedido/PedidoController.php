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

    public function show(Pedido $pedido)
    {
        $mesa = Mesa::find($pedido->mesa_id);
        $allProdutos = Produto::all();
        return view('pedidos.show', [
            'pedido' => $pedido,
            'allProdutos' => $allProdutos,
            'mesa' => $mesa
        ]);
    }

    public function edit($mesa_id)
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
            'mesa' => $mesa
        ]);
    }

    public function destroy(Pedido $pedido){

        $pedido->update(['finalizado' => true]) ;
        $pedido->mesa->update(['ocupada' => false]);
        $pedido->delete();


        return redirect()->route('mesas.index')->with('success', 'Pedido Finalizado com Sucesso!');
    }
}
