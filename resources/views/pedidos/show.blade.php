@extends('layouts.panel')
@section('title', 'Pedidos')
@section('content')
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">Produtos</div>
        <div class="card-body">
            <form method="POST" action="{{ route('pedido.produto.store', $pedido->id)}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <select class="form-control" name="produto_id">
                            <option value="">Selecione</option>
                            @foreach ($allProdutos as $produto)
                                <option value="{{ $produto->id }}">
                                    {{ $produto->nome_produto}} -- {{ $produto->preco}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-success">Incluir</button>
                    </div>
                </div>
            </form>
            <table class="table bg-white mt-3">
                <thead>
                    <th>Nome</th>
                    <th class="text-right">Remover</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

@endsection
