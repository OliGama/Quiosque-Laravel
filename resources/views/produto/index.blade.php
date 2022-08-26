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
            <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$produto->nome_produto}}</td>
                    <td>{{$produto->preco}}</td>
                    <td>{{$produto->tipo_produto}}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-sm btn-primary mr-2" href="{{ route('produto.edit', $produto-> id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('produto.destroy', $produto->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
