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
use Illuminate\Support\Arr;

class RelatorioController extends Controller
{
    public function index() {
        return view('relatorio.index');
    }

    public function create(RelatorioRequest $request)
    {
        $pedidos = DB::table('pedido_produto')->whereBetween('created_at', [date($request->dataInicio), date($request->dataFinal)])->get()->groupBy('produto_id');
        $allProdutos = Produto::all(['id', 'tipo_produto', 'nome_produto', 'preco']);
        $relatorios = [];
        $tmp_total = 0;
        $tmp_servico = 0;

        foreach ($pedidos as $key => $pedido) {
            $tmp = $allProdutos->find($key);
            $tmp_qnt = $pedido->sum('quantidade');
            $tmp_totalPedido = $pedido->sum('quantidade') * $tmp->preco;
            $tmp_total = $tmp_total + $tmp_totalPedido;
            $tmp_servico = $tmp_total / 11;
            array_push($relatorios, [
                'id_produto' => $tmp->id,
                'tipo' => $tmp->tipo_produto,
                'nome' => $tmp->nome_produto,
                'quantidade' => $tmp_qnt,
                'totalPedido' => $tmp_totalPedido,
            ],);
        }

        // dd($relatorios, $tmp_total,);
        // dd($pedidos);
        return view('relatorio.show', [
            'relatorios' => $relatorios,
            'total' => $tmp_total,
            'servico' => $tmp_servico,
        ]);
    }
}
