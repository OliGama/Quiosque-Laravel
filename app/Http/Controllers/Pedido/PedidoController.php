<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        return  view('pedidos.index');
    }

    public function abrir($mesaid){

        $pedido = Pedido::where('mesa_id', $mesaid)->where('finalizado', false)->first();

        if($pedido){
            return redirect()->route('pedidos.show', $pedido);
        }

        return redirect()->route('pedidos.create', $mesaid);
    }

    public function create($id)
    {
        $mesa = Mesa::find($id);

        $pedido = Pedido::create([
            'mesa_id' => $mesa->id,
            'usuario_id' => Auth::id()
        ]);



        return redirect()->route('pedidos.show', $pedido);
    }

    public function show(Pedido $pedido)
    {
        $mesa = Mesa::find($pedido->mesa_id);
        $allProdutos = Produto::all();
        $tipos = $allProdutos->pluck('tipo_produto')->unique();
        return view('pedidos.show', [
            'pedido' => $pedido,
            'allProdutos' => $allProdutos,
            'mesa' => $mesa,
            'tipos' => $tipos
        ]);
    }

    // public function edit($mesa_id)
    // {

    //     $mesa = Mesa::find($mesa_id);

    //     if (!$mesa) {
    //         return back()->with('warning', $mesa->numero.' não esta cadastrada');
    //     }
    //     if ($mesa->ocupada == 0) {
    //         return back()->with('warning', $mesa->numero.' esta fechada');
    //     }

    //     $pedido = Pedido::where('mesa_id', $mesa_id)->where('finalizado', 0)->first();

    //     if (!$pedido) {
    //         return back()->with('warning', $mesa->numero.' ainda não tem pedidos');
    //     }
    //     if ($pedido->finalizado == 1) {
    //         return back()->with('warning', 'Mesa não tem pedido');
    //     }

    //     $produto = Produto::all();

    //     return view('pedidos.edit', [
    //         'pedido' => $pedido,
    //         'allProdutos' => Produto::all(),
    //         'mesa' => $mesa
    //     ]);
    // }

    public function destroy(Pedido $pedido){

        $pedido->update(['finalizado' => true]) ;
        $pedido->mesa->update(['ocupada' => false]);
        $mesa = Mesa::where('juntar', $pedido->mesa_id);
        if($mesa){
            $mesa->update(['juntar' => null, 'ocupada' => false]);
            return redirect()->route('mesas.index')->with('success', 'Pedido Finalizado com Sucesso!');
        }
        $pedido->delete();


        return redirect()->route('mesas.index')->with('success', 'Pedido Finalizado com Sucesso!');
    }
}
