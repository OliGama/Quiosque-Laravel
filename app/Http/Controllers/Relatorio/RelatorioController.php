<?php

namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index() {
        $dataInicio = Pedido::find('timestamp');
        dd($dataInicio);
        return view('relatorio.index', compact('dataInicio'));
    }

    public function show(Request $request) {
        // $pedidos = Pedido::all();
        // $produtos = Produto::find($request->produto_id);
        // $usuario = User::find($request->usuario_id);
        // // $pedidos_produtos = PedidoProduto::find('pedido_id', 'produdo_id', 'quantidade');
        // dd($pedidos);
        // return view('relatorio.show', [
        //     'pedidos' => $pedidos,
        //     'produtos' => $produtos,
        //     'usuario' => $usuario
        // ]);
    }
}
