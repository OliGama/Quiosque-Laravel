@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    <h2 class="text-center text-dark">Relatorio</h2>
    <br>
    <table class="table table-hover shadow">
        <thead>
            <tr>
                <th class="text-center" scope="col">ID Produto</th>
                <th class="text-center" scope="col">Tipo</th>
                <th class="text-center" scope="col">Produto</th>
                <th class="text-center" scope="col">Quantidade</th>
                <th class="text-center" scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($relatorios as $relatorio)
                <tr>
                    <td class="text-center"><b>{{ $relatorio['id_produto'] }}</b></td>
                    <td class="text-center">{{ $relatorio['tipo'] }}</td>
                    <td class="text-center">{{ $relatorio['nome'] }}</td>
                    <td class="text-center">{{ $relatorio['quantidade'] }}</td>
                    <td class="text-center">R$ {{ $relatorio['totalPedido'] }},00</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-dark">Não há pedidos no intervalo selecionado</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="5" class="text-end text-dark"><b>Total:</b></td>
            </tr>
        </tbody>
    </table>
@endsection
