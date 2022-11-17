<?php

namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Relatorio\RelatorioRequest;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use App\Models\Relatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function index() {
        return view('relatorio.index');
    }

    public function create(RelatorioRequest $request)
    {
        $pedidos = DB::table('pedido_produto')->whereBetween('created_at', [date($request->dataInicio), date($request->dataFinal)])->get();

        // dd($produtos);
        $allProdutos = Produto::find();
// dd($pedidos);
        // $produtos = DB::table('pedido_produto')->where('produto_id', $produto->id);
        // $produto_nome = $allProdutos->pluck('id','nome_produto')->unique();
        dd($allProdutos);
        // dd($produtos);
        return view('relatorio.show', [
            'pedidos' => $pedidos,
            'produtos' => $allProdutos
        ]);
    }
}
