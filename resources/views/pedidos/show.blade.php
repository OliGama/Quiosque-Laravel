@extends('layouts.panel')
@section('title', 'Pedidos')
@section('content')
    <div class="card mt-4">
        <div class="card-header text-white" style="background-color: #4e73df">Pedido</div>
        <div class="card-body">
            <form method="POST" action="{{ route('pedido.produto.store', $pedido->id) }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <select class="form-control" name="produto_id">
                            <option value="" disabled selected>Selecione um produto</option>
                            @foreach ($allProdutos as $produto)
                                <option value="{{ $produto->id }}">
                                    {{ $produto->nome_produto }} -- R$ {{ $produto->preco }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <select class="form-control" name="produto_quantidade">
                            <option value="" disabled selected>Selecione uma quantidade</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="quantidade">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-md btn-outline-primary active">Incluir</button>
                    </div>
                </div>
            </form>
            <table class="table bg-white mt-3">
                <thead>
                    <th>Nome do Produto</th>
                    <th>Quantidade do Produto</th>
                    <th class="text-end">Remover</th>
                </thead>
                <tbody>
                    <td>Coca Cola</td>
                    <td>2</td>
                    <td class="text-end">
                        <button type="submit" class="btn btn-sm btn-danger confirm-submit">
                            <i style="color: #000" class="fa fa-trash"></i>
                        </button>
                    </td>
                </tbody>
            </table>
            <div class="col d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-md btn-outline-primary active">Enviar</button>
                <button type="submit" class="btn btn-md btn-secondary">Concluir</button>
            </div>
        </div>
    </div>
@endsection
