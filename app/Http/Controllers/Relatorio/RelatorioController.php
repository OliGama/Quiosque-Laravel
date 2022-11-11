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
        $allProdutos = Produto::all();
        $produto_nome = $allProdutos->pluck('nome_produto')->first();
        // dd($produto_nome);
        return view('relatorio.show', [
            'pedidos' => $pedidos,
            'nome_produto' => $produto_nome
        ]);
    }
}
