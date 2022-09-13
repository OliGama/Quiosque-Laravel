@extends('layouts.panel')
@section('title', 'Mesas')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex hstack gap-2" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center">
                @foreach ($mesas as $mesa)
                    <div
                        class="col-2 card shadow @if ($mesa->ocupada == 0) text-bg-success mb-3
                        @elseif ($mesa->ocupada == 1) text-bg-danger mb-3 @endif">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase">{{ $mesa->numero }}</h5>
                            <h6 class="card-subtitle mb-2 text-dark">
                                @if ($mesa->ocupada == 0)
                                    Vazia
                                @elseif ($mesa->ocupada == 1)
                                    Ocupada
                                @endif
                            </h6>
                            <p class="card-text"></p>
                            @if ($mesa->ocupada == 0)
                                <form method="POST" action="{{ route('mesas.abrir', $mesa->id) }}">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success active">
                                        Abrir Mesa
                                    </button>
                                </form>
                            @elseif ($mesa->ocupada == 1)
                                <div class="hstack gap-2">
                                    <button type="button" class="btn btn-outline-primary active btn-sm "
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $mesa->id }}">
                                        Fazer Pedido
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" style="margin-top: 3px"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdropDelete{{ $mesa->id }}">
                                        Fechar Mesa
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('pedidos.create', $mesa->id) }}">
                                    @csrf
                                    <div class="modal fade" id="staticBackdrop{{ $mesa->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="staticBackdropLabel">
                                                        Tem certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="text-secondary">Pedido para
                                                        {{ $mesa->numero }}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" class="btn btn-outline-primary active"
                                                        data-bs-dismiss="modal">Fazer
                                                        o
                                                        pedido</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="{{ route('mesas.fechar', $mesa->id) }}">
                                    @method('put')
                                    @csrf
                                    <div class="modal fade" id="staticBackdropDelete{{ $mesa->id }}"
                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-dark" id="staticBackdropLabel">
                                                        Tem
                                                        certeza?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="text-secondary">Fechar a
                                                        {{ $mesa->numero }}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit" style="margin-top: 3px"
                                                        class="btn btn btn-danger">
                                                        Fechar Mesa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
