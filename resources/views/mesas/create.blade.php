@extends('layouts.panel')
@section('title', 'Nova Mesa')
@section('content')
    <form action="{{ route('mesas.store') }}" method="POST" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" id="numero"
                        name="numero" placeholder="Nova Mesa" value="{{ old('numero') }}">
                    <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-2">Salvar</button>
    </form>
@endsection
