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
            ->with('success', 'Mesa adicionada com sucesso!');
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

    public function juntar($id1, $id2)
    {
        $mesa1 = Mesa::with('pedidos.produtos')->find($id1);
        $mesa2 = Mesa::with('pedidos.produtos')->find($id2);
        $pedidos = $mesa2->pedidos()->first();
        $pedido_final = $mesa1->pedidos()->where('finalizado', false)->with('produtos')->first()->produtos->pluck('id')->toArray();
        // $mesa2->pedidos()->where('finalizado', false)->delete();

        foreach ($pedidos->produtos as $key => $produto) {
            if(in_array($produto->id, $pedido_final)){
                // somas as quantidades
            } else {
                // cria um novo
            }
        }

        return redirect()->route('mesas.index');
    }
}
