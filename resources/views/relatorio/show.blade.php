@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">ID do Pedido</th>
                <th scope="col">ID do Produto</th>
                {{-- <th scope="col">Produto</th> --}}
                <th scope="col">Quantidade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            @if ($pedido->produto_id == $produtos->id)
                {{$produtos->nome_produto}}
            @endif
                <tr>
                    <th>{{ $pedido->created_at }}</th>
                    <td>{{ $pedido->pedido_id }} </td>
                    <td>{{ $pedido->produto_id->pivot()->produto_nome }}</td>
                    {{-- <td>@if ($pedido->pedido_id == $allProdutos->id)
                        {{$allProdutos->nome_produto}}
                    @endif</td> --}}
                    <td>{{ $pedido->quantidade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
