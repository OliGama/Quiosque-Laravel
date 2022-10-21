@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    @foreach ($pedidos as $pedido)
        @if ($pedido->finalizado == 1)
            <table>
                <th>ID do pedido</th>
                <th>Mesa do pedido</th>
                <th>Usuario </th>

                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->mesa_id }}</td>
                <td>{{ $pedido->usuario_id}}</td>
            </table>
        @endif
    @endforeach
@endsection
