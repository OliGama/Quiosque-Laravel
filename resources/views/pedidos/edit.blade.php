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
                        <select class="form-control" name="quantidade">
                            <option value="" disabled selected>Selecione uma quantidade</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value={{ $i }}>{{ $i }}</option>
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
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome_produto }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('pedido.produto.destroy', [
                                    'pedido' => $pedido->id,
                                    'produto' => $produto->id
                                ]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger confirm-submit" name="{{ $pedido->id }}">
                                        <i style="color: #000" class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-md btn-outline-primary active">Enviar</button>
                <form method="POST" action="{{ route('pedidos.destroy', $pedido) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-md btn-secondary">Concluir</button>
                </form>
            </div>
        </div>
    </div>
@endsection
