@extends('layouts.panel')
@section('title')
    Editar produto
@endsection

@section('title2')
<div class="title d-flex justify-content-center" style="color: black">
    Editar produto
</div>
@endsection

@section('content')
    <form action="{{ route('produto.update', $produto->id) }}" method="POST" autocomplete="off">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="nome_produto">Nome do produto</label>
                    <input type="text" class="form-control {{ $errors->has('nome_produto') ? 'is-invalid' : '' }}"
                        id="nome_produto" name="nome_produto"
                        value="{{ old('nome_produto', isset($produto) ? $produto->nome_produto : '') }}">
                    <div class="invalid-feedback">{{ $errors->first('nome_produto') }}</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control preco {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                        id="preco" name="preco" value="{{ old('preco', isset($produto) ? $produto->preco : '') }}">
                    <div class="invalid-feedback">{{ $errors->first('preco') }}</div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="tipo_produto">Tipo do produto</label>
                    <input type="text" class="form-control {{ $errors->has('tipo_produto') ? 'is-invalid' : '' }}"
                        id="tipo_produto" name="tipo_produto"
                        value="{{ old('tipo_produto', isset($produto) ? $produto->tipo_produto : '') }}">
                    <div class="invalid-feedback">{{ $errors->first('tipo_produto') }}</div>
                </div>
            </div>
        </div>
        <button type="s ubmit" class="btn btn-success mt-2">Salvar</button>
    </form>
@endsection
