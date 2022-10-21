<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Produto\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
Use App\Models\Mesa;
use LaravelQRCode\Facades\QRCode;

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

    public function menuQR(Mesa $id){

        $produtos = Produto::query();

        return QRCode::url('werneckbh.github.io/qr-code/')
                  ->setSize(8)
                  ->setMargin(2)
                  ->png();


        // view('produto.cardapio', [
        //     'produtos' => $produtos->paginate(10),
        //     $id
        // ]);
    }
}
