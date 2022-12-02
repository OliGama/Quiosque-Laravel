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

    public function juntar(Request $request)
    {
        //$mesa = Mesa::find($mesa->pedidos());
        $mesa1 = Mesa::with('pedidos.produtos')->find($request->id1);
        $mesa2 = Mesa::with('pedidos.produtos')->find($request->id2);


        $pedido_mesa1 = $mesa1->pedidos()->where('finalizado', false)->with('produtos')->first();
        $pedido_mesa2 = $mesa2->pedidos()->where('finalizado', false)->with('produtos')->first();

        if (!$pedido_mesa1) {
            return redirect()->route('mesas.index')->with('warning', 'Não há pedido aberto na mesa '.$mesa1->id);
        }
        if (!$pedido_mesa2) {
            $mesa2->update(['juntar' => $mesa1->id]);
            return redirect()->route('mesas.index');
        }
        $mesa2->update(['juntar' => $mesa1->id]);

        $produtos_final = $pedido_mesa1->produtos->pluck('id')->toArray();
        // $mesa2->pedidos()->where('finalizado', false)->delete();

        foreach ($pedido_mesa2->produtos as $key => $produto) {
            if(in_array($produto->id, $produtos_final)){

                $pedido_produto = $pedido_mesa1->produtos->where('id', $produto->id)->first();
                $pedido_produto->pivot->update([
                    'quantidade' => $pedido_produto->pivot->quantidade + $produto->pivot->quantidade,
                ]);

            } else {
                $pedido_mesa1->produtos()->attach([$produto->id => [
                    'quantidade' => $produto->pivot->quantidade,
                    'observacao' => $produto->pivot->observacao
                ]]);
            }
        }

        $pedido_mesa2->produtos()->detach();
        $pedido_mesa2->update([
            'finalizado' => true
        ]);

        return redirect()->route('mesas.index');
    }

    public function separar(Mesa $mesa){
        $mesa->update(['juntar' => null, 'ocupada' => false]);
        return redirect()->route('mesas.index');
    }
}
