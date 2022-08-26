@extends('layouts.panel')
@section('title')
View Index
@endsection
@section('content')
    <p class="text-end"><a href="{{route('produto.create')}}">Inserir produto</a></p>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do Produto</th>
            <th scope="col">Preço</th>
            <th scope="col">Tipo</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$produto->nome_produto}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->tipo_produto}}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection
