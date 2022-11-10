<?php

namespace App\Http\Controllers\Relatorio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Relatorio\RelatorioRequest;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use App\Models\Relatorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function index() {
        return view('relatorio.index');
    }

    public function create(RelatorioRequest $request) {
        Relatorio::create($request->all());
        dd($request);
        return redirect()
            ->route('relatorio.show')
            ->with('success', 'Relatorio criado com sucesso!');
    }

    public function show(RelatorioRequest $request) {
        $relatorio = Relatorio::all();
        dd($relatorio);
        return view('relatorio.show', compact('relatorio'));
    }
}
