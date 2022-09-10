@extends('layouts.panel')

@section('title')
    Produtos
@endsection

@section('title2')
    <div class="d-flex justify-content-center" style="color: #000000">
        Lista de Produtos
    </div>
@endsection

@section('content')
    <div class="d-flex">
        <form class="col-9">
            <div class="flex mb-4" >
                <div class="d-flex align-items-center">
                    <span style="font-weight: bold">Buscar produto</span>
                    <input type="text" name="search" class="form-control w-50 mr-2" style="margin-left: 5px" value="" placeholder="Pesquisar...">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @if(auth()->user()->role === 'caixa')
            <div class="container d-flex justify-content-end col-3" style="margin-bottom: 5px">
                <div class="btn btn-success"><a style="color: #000000; font-weight: bold; text-decoration: none; height: 10px"
                        href="{{ route('produto.create') }}">Inserir produto</a>
                </div>
            </div>
        @endif
    </div>
    <table class="table table-hover">
        <thead>
            <tr style="color: #000000">
                <th scope="col">ID</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Preço (R$)</th>
                <th scope="col">Tipo</th>
                @if (auth()->user()->role === 'caixa')
                    <th scope="col">Ações</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr style="color: #000000">
                    <th scope="row">{{$produto->id}}</th>
                    <td>{{ $produto->nome_produto }}</td>
                    <td>R$ {{ $produto->preco }}</td>
                    <td>{{ $produto->tipo_produto }}</td>
                    @if (auth()->user()->role === 'caixa')
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="btn btn-sm btn-warning mr-2" href="{{ route('produto.edit', $produto->id) }}">
                                    <i style="color: #000000" class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                                        <i style="color: #000000" class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Não há dados no momento</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{$produtos->links()}}
@endsection
