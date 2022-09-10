@extends('layouts.panel')
@section('title', 'Mesas')
@section('content')
    <!-- <form method="GET" action="{{ route('mesas.store') }}"> -->
    @foreach ($mesas as $mesa)
        <div class="container-fluid">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $mesa->numero }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">
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
                            <button type="submit" class="btn btn-sm btn-success">
                                Abrir Mesa
                            </button>
                        </form>
                    @elseif ($mesa->ocupada == 1)
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ route('pedidos.create', $mesa->id) }}">
                                        @csrf
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Fazer Pedido
                                        </button>
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Tem certeza que
                                                            quer fazer o
                                                            pedido??</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Fazer
                                                            o
                                                            pedido</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="POST" action="{{ route('mesas.fechar', $mesa->id) }}">
                                        @method('put')
                                        @csrf
                                        <!-- <form action="{{ $mesa->ocupada == 0 }}"> -->
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Fechar Mesa
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <!-- </form> -->
@endsection
