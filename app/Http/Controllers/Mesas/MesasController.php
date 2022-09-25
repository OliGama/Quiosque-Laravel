<?php

namespace App\Http\Controllers\Mesas;

use App\Http\Controllers\Controller;
use App\Models\Mesa;
use App\Http\Requests\Mesa\MesaRequest;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;


class MesasController extends Controller
{
    public function index()
    {
        $mesas = Mesa::all();
        return view('mesas.index', compact('mesas'));
    }

    public function create()
    {
        return view('mesas.create');
    }

    public function store(MesaRequest $request)
    {
        Mesa::create($request->all());


        return redirect()
            ->route('mesas.index')
            ->with('success', 'Mesa cadatrada com sucesso!');
    }

    public function edit(Mesa $mesa)
    {
        return view('mesas.edit', compact('mesa'));
    }

    public function destroy(Mesa $mesa)
    {
        $mesa->ocupada == 0;

        return redirect()
            ->route('mesas.index')
            ->with('success', 'Mesa Ocupada!');
    }

    public function abrir(Mesa $mesa)
    {
        $mesa->update(['ocupada' => true]);

        return redirect()->route('mesas.index')->with('success', $mesa->numero.' aberta com sucesso');
    }

    public function fechar(Mesa $mesa)
    {
        $mesa->update(['ocupada' => false]);

        return redirect()->route('mesas.index')->with('success', $mesa->numero.' fechada com sucesso');
    }
}
