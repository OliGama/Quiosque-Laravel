@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    <form method="POST" action="{{ route('relatorio.create') }}">
        @csrf
        <div class="card shadow">
            <h5 class="card-header">Relatorios</h5>
            <div class="card-body">
                {{-- <h5 class="card-title">Special title treatment</h5> --}}
                <p class="card-text">Escolher um período</p>
                <p>De: <input type="date" name="dataInicio" id="dataInicio"></p>
                <p>À: <input type="date" name="dataFinal" id="dataFinal"></p>
                <button type="submit" class="btn btn-md btn-outline-primary active shadow">Gerar</button>
            </div>
        </div>
    </form>
@endsection
