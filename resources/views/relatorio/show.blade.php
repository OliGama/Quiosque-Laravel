@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Inicio</th>
                <th scope="col">Final</th>
                <th scope="col">Total vendas</th>
                <th scope="col">Lucro</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>{{ $relatorio->dataInicio }}</th>
                <td>{{ $relatorio->dataFinal }}</td>
                <td>{{ $relatorio->totalVendas }}</td>
                <td>{{ $relatorio->lucro }}</td>
            </tr>
        </tbody>
    </table>
@endsection
