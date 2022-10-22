<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
Use App\Models\Mesa;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $produtos = Produto::query();

        if(isset($request->search) && $request->search !== ''){
            $produtos->where('nome_produto', 'like', '%'.$request->search.'%');
        }

        return view('produto.index', [
            'produtos' => $produtos->paginate(10),
            'search' => isset($request->search) ? $request->search : ''
        ]);
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

    public function cardapio(Mesa $id){

        $produtos = Produto::query();
        return view('produto.cardapio', [
            'produtos' => $produtos->paginate(10),
            $id
        ]);
    }

    public function esgotado(Produto $produto){

        if($produto->esgotado == false){
            $produto->update(['esgotado' => true]);
            dd($produto);
        }elseif($produto->esgotado == true){
            $produto->update(['esgotado' => false]);
        }
        return view('produto.index');
    }
}
