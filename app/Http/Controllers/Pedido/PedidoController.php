<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoController extends Controller
{
    public function index(){
        return  view('pedidos.index');
    }

    public function create(Request $request, $id){
        $mesa = Mesa::find($id);

        $pedido = Pedido::create([
            'mesa_id'=> $mesa->id
        ]);



        return redirect()->route('pedidos.show', $pedido);
    }

    public function show(Pedido $pedido){
        return view('pedidos.show', [
            'pedido' => $pedido,
            'allProdutos' => Produto::all()
        ]);
    }
}
