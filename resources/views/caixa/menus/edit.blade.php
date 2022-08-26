@extends('layouts.app')

@section('content')
    <h1>Edição de Menus</h1>

    <hr>
    <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="POST">
        {{ csrf_field() }}
        <p class="form-group">
            <label>Nome do menu</label>
            <input type="text" name="nome" value="{{ old('nome') != '' ? old('nome') : $menu->nome }}"
                class="form-control @if ($errors->has('nome')) is-invalid @endif">
            <span class="invalid-feedback">
                @if ($errors->has('nome'))
                    <strong> {{ $errors->first('nome') }} </strong>
                @endif
            </span>
        </p>
        <p class="form-group">
            <label>Preço</label>
            <input type="text" name="preco" value="{{ old('preco') != '' ? old('preco') : $menu->preco }}"
                class="form-control @if ($errors->has('preco')) is-invalid @endif">
            <span class="invalid-feedback">
                @if ($errors->has('preco'))
                    <strong> {{ $errors->first('preco') }} </strong>
                @endif
            </span>
        </p>

        <p class="form-group">
            <label>Quiosque</label>
            <select name="quiosque_id" class="form-control">
                @foreach ($quiosque as $r)
                    <option value="{{ $r->id }}" @if ($menu->quiosque_id == $r->id) selected @endif>
                        {{ $r->nome }}</option>
                @endforeach
            </select>
            <span class="invalid-feedback">
                @if ($errors->has('quiosque_id'))
                    <strong> {{ $errors->first('quiosque_id') }} </strong>
                @endif
            </span>
        </p>





        <input type="submit" value="Atualizar" class="btn btn-success btn-lg">


    </form>
@endsection
