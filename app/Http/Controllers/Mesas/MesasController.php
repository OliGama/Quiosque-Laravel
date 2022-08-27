<?php

namespace App\Http\Controllers\Mesas;

use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Http\Requests\Mesa\MesaRequest;
use Illuminate\Http\Request;


class MesasController extends Controller
{
    public function index()
    {
        return view('mesas.index');
    }
    
    public function create()
    {
        return view('mesas.create');
    }

    public function store(MesaRequest $request)
    {
        Mesa::create($request->validated());

        return redirect()
            ->route('mesas.index')
            ->with('success', 'Mesa cadatrado com sucesso!');

            
    }



    public function edit()
    {
        return view('mesas.edit');
    }

}
