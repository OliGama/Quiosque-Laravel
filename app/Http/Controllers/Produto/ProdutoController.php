<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\ProdutoRequest;
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

    public function show($id){
        $produtos = Produto::findOrFail($id);

        return view('produto.show', $produtos);
    }
    
    public function edit(Produto $produto){
        return view('produto.edit', [
            'produto' => $produto
        ]);
    }

    public function update(Produto $produto){
        return view('produto.edit', [
            'produto' => $produto
        ]);
    }
}
