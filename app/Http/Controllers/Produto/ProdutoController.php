<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
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

    public function store()
    {
        
    }
}