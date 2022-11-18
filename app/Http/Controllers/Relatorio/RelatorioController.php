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
        $pedidos = DB::table('pedido_produto')->whereBetween('created_at', [date($request->dataInicio), date($request->dataFinal)])->get()->groupBy('produto_id');
        $allProdutos = Produto::all(['id', 'nome_produto', 'preco']);
        $relatorio = [];

        foreach ($pedidos as $key => $pedido) {
            $tmp = $allProdutos->find($key);
            $tmp_qnt = $pedido->sum('quantidade');
            array_push($relatorio, [
                'nome' => $tmp->nome_produto,
                'quantidade' => $tmp_qnt,
                'total' => $tmp_qnt * $tmp->preco
            ]);
        }


        dd($relatorio);
        // dd($produto_nome);
        return view('relatorio.show', [
            'pedidos' => $pedidos        ]);
    }
}
