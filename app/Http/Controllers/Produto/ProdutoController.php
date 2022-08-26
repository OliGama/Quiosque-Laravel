<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produto.index');
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        Produto::create($request->all());

        return redirect()->route('produto.index');
    }


}
