<?php

namespace App\Http\Controllers\Cozinha;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CozinhaController extends Controller
{
    public function index()
    {
        return view('cozinha.index');
    }
}
