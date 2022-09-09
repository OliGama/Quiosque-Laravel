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
    @if(auth()->user()->role === 'caixa')
        <div class="container d-flex justify-content-end" style="margin-bottom: 5px">
            <div class="btn btn-success"><a style="color: #000000; font-weight: bold; text-decoration: none"
                    href="{{ route('produto.create') }}">Inserir produto</a>
            </div>
        </div>
    @endif
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
@endsection
