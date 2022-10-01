@extends('layouts.panel')
@section('title', 'Pedidos')
@section('content')
<div class="card mt-4">
    <div class="card-header text-white" style="background-color: #4e73df"><strong>Pedido para {{ $mesa->numero }}</strong></div>
    <div class="card-body">
        <form method="POST" action="{{ route('pedido.produto.store', $pedido->id) }}">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-5">
                    <select class="form-control
                        @if ($errors->has('produto_id')) is-invalid @endif shadow-sm" name="produto_id">
                        <option value="" disabled selected>Selecione um produto</option>
                        @foreach ($allProdutos as $produto)
                        <option value="{{ $produto->id }}" @if (old('produto_id')==$produto->id) selected @endif>
                            {{ $produto->nome_produto }} -- R$ {{ $produto->preco }}
                        </option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('produto_id') }}</div>
                </div>
                <div class="col-12 col-lg-2">
                    <select class="form-control @if ($errors->has('quantidade')) is-invalid @endif shadow-sm" name="quantidade">
                        <option value="" disabled selected>Selecione uma quantidade</option>
                        @for ($i = 1; $i < 11; $i++) <option value={{ $i }} @if (old('quantidade')==$i) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('quantidade') }}</div>
                </div>
                <div class="col-12 col-lg-2">
                    <input type="text" name="observacao" id="observacao" placeholder="Obervações" class="form-control text-dark shadow-sm @if ($errors->has('observacao')) is-invalid @endif" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <div class="invalid-feedback">{{ $errors->first('observacao') }}</div>
                </div>

                <div class="col-12 col-lg-2">
                    <button type="submit" class="btn btn-md btn-outline-primary active shadow-sm">Incluir</button>
                </div>
            </div>
        </form>
        <table class="table bg-white mt-3">
            <thead>
                <th>Nome do Produto</th>
                <th>Quantidade do Produto</th>
                <th>Observações</th>
                <th class="text-end">Remover</th>
            </thead>
            <tbody>
                @foreach ($pedido->produtos as $produto)
                <tr>
                    <td>{{ $produto->nome_produto }}</td>
                    <td>{{ $produto->pivot->quantidade }}</td>
                    <td>{{ $produto->pivot->observacao }}</td>
                    <td class="text-end">

                        <a href="{{ route('mais.produto', [$pedido, $produto])}}" role="button" class="btn btn-sm btn-outline-success shadow">+</a>

                        <a href="{{ route('menos.produto', [$pedido, $produto])}}" role="button" class="btn btn-sm btn-outline-success shadow">-</a>
                        <form method="POST" action="{{ route('pedido.produto.destroy', [
                                        'pedido' => $pedido->id,
                                        'produto' => $produto->id,
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
            <a href="{{ route('mesas.index') }}" class="btn btn-md btn-outline-primary shadow active" role="button">Enviar</a>
            {{-- <button type="submit" class="btn btn-md btn-outline-primary active">Enviar</button> --}}
            <form method="POST" action="{{ route('pedidos.destroy', [$pedido, $mesa]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-md btn-secondary">Finalizar</button>
            </form>
        </div>
    </div>
</div>
@endsection
