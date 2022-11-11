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
        $produtos = DB::table('pedido_produto')->whereBetween('created_at', [date($request->dataInicio), date($request->dataFinal)])->get();
        dd($produtos);
        return redirect()
            ->route('relatorio.index')
            ->with('success', 'Relatorio criado com sucesso!');
    }

    public function show(Relatorio $relatorio) {
        $relatorio = Relatorio::all();

        $totalVendas = Pedido::findOrFail('quantidade');
        $lucro = Produto::findOrFail('preco');

        $relatorio->totalVendas = $totalVendas;
        $relatorio->lucro = $lucro;
        dd($relatorio);
        return view('relatorio.show', compact('relatorio'));
    }
}
