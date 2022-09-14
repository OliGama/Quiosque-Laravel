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
        return view('pedidos.show', [
            'pedido' => $pedido,
            'allProdutos' => Produto::all()
        ]);
    }

    public function edit( $mesa_id)
    {

        $mesa = Mesa::find($mesa_id);

        if (!$mesa) {
            return back()->with('warning', 'Mesa não esta cadastrada');
        }
        if ($mesa->ocupada == 0) {
            return back()->with('warning', 'Mesa esta fechada');
        }

        $pedido = Pedido::where('mesa_id', $mesa_id)->where('finalizado', 0)->first();
        $produto = Produto::all();
        return view('pedidos.edit', [
            'pedido' => $pedido,
            'allProdutos' => Produto::all()
        ]);
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->update(['ocupada' => false]);

        return redirect()->route('mesas.index');
    }
}
