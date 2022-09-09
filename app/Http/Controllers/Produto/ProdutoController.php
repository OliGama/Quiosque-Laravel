<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produto.index', ['produtos' => Produto::all()]);
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(ProdutoRequest $produto)
    {
        Produto::create($produto->validated());

        return redirect()->route('produto.index');
    }

    public function edit(Produto $produto)
    {
        return view('produto.edit', [
            'produto' => $produto
        ]);
    }

    public function update(Produto $produto, Request $request)
    {
        $produto->update($request->all());

        return redirect()
            ->route('produto.index')
            ->with('success', 'Produto atualizado!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index')->with('success', 'Produto deletado!');
    }
}
