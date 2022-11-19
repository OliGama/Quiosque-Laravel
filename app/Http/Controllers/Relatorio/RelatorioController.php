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
        $tmp_total = [];
        $total = array_sum($tmp_total);

        foreach ($pedidos as $key => $pedido) {
            $tmp = $allProdutos->find($key);
            // $tmp_data = $pedidos->created_at;
            $tmp_qnt = $pedido->sum('quantidade');
            $tmp_totalPedido = $pedido->sum('quantidade') * $tmp->preco;
            array_push($relatorios, [
                // 'data' => $tmp_data,
                'id_produto' => $tmp->id,
                'tipo' => $tmp->tipo_produto,
                'nome' => $tmp->nome_produto,
                'quantidade' => $tmp_qnt,
                'totalPedido' => $tmp_totalPedido,
            ],);
            array_push($tmp_total, [
                'totalPedido' => $tmp_totalPedido
            ]);
        }

        // dd($relatorios, $tmp_total, $total);
        // dd($pedidos);
        return view('relatorio.show', [
            'relatorios' => $relatorios
        ]);
    }
}
