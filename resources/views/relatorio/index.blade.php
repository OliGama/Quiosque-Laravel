@extends('layouts.panel')
@section('title', 'Relatorios')
@section('content')
    <div class="card shadow">
        <h5 class="card-header">Relatorios</h5>
        <div class="card-body">
        {{-- <h5 class="card-title">Special title treatment</h5> --}}
        <p class="card-text">Escolher um período</p>
        <p>De: <input type="date" name="dataInicio" id="dataInicio"></p>
        <p>À: <input type="date" name="dataFinal" id="dataFinal"></p>
        <button type="submit" class="btn btn-md btn-outline-primary active shadow" data-bs-toggle="modal" data-bs-target="#GerarRelatorio">Gerar</button>
        </div>
    </div>
    <div class="modal fade" id="GerarRelatorio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Relatorio do periodo (dataInicio) - (dataFinal)</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              (Relatorio)
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-md btn-outline-primary active shadow" data-bs-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>
@endsection
