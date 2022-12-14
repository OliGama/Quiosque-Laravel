@extends('layouts.panel')
@section('title', 'Mesas')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col d-flex hstack gap-2"
                style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center">
                @foreach ($mesas as $mesa)
                    <div
                        class="col-5 card shadow @if ($mesa->ocupada == 0) bg-success bg-gradient mb-3
                        @elseif ($mesa->ocupada == 1 && $mesa->juntar == null)
                            bg-warning bg-gradient mb-3
                        @endif
                        @if ($mesa->juntar != null)
                            bg-secondary bg-gradient mb-3
                        @endif
                        ">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase" style="color: #fff">{{ $mesa->numero }}</h5>
                            <h6 class="card-subtitle mb-2 text-dark">
                                @if ($mesa->ocupada == 0)
                                    Vazia
                                @elseif ($mesa->ocupada == 1 && $mesa->juntar == null)
                                    Ocupada
                                @endif
                                @if ($mesa->juntar != null)
                                    Junta com a Mesa {{$mesa->juntar}}
                                @endif
                            </h6>
                            <p class="card-text"></p>
                            @if ($mesa->ocupada == 0)
                                <form method="POST" action="{{ route('mesas.abrir', $mesa->id) }}">
                                    @method('put')
                                    @csrf
                                    <button type="submit" class="btn btn-md btn-outline-success shadow active">
                                        Abrir
                                    </button>
                                </form>
                            @elseif ($mesa->ocupada == 1 && $mesa->juntar == null)
                                <div class="hstack gap-2">
                                    <button type="button" class="btn btn-outline-primary shadow active btn-md "
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $mesa->id }}">
                                        Pedido
                                    </button>
                                    <form method="POST" action="{{ route('mesas.fechar', $mesa->id) }}">
                                        @method('put')
                                        @csrf
                                        <button type="submit" class="btn btn-md btn-secondary shadow ">
                                            Fechar
                                        </button>
                                    </form>
                                </div>
                                <form method="POST" action="{{ route('pedidos.abrir', $mesa->id) }}">
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
                                                    <span class="text-secondary">Pedido para a
                                                        {{ $mesa->numero }}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-md shadow"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                    <button type="submit"
                                                        class="btn btn-outline-primary btn-md shadow active"
                                                        data-bs-dismiss="modal">Fazer
                                                        o
                                                        pedido</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                            @if ($mesa->juntar != null)
                                    <div class="hstack gap-2">
                                        <form method="POST" action="{{ route('mesas.separar', $mesa) }}">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-md btn-secondary shadow ">
                                                Separar
                                            </button>
                                        </form>
                                    </div>
                                @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <form method="GET" action="{{ route('mesas.create') }}">
                    <button type="submit" class="btn btn-md btn-outline-primary shadow active">Adicionar Mesa</button>
                </form>
            </div>
            <div class="d-flex justify-content-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-md btn-outline-primary shadow active" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Juntar mesas
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Escolha as mesas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{route('mesas.juntar')}}">
                                @csrf
                                <div class="modal-body">
                                    <select class="form-select {{ $errors->has('numero') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="id1">
                                        <option value="" selected>Selecione a mesa principal</option>
                                        @foreach ($mesas as $mesa1)
                                            <option value="{{$mesa1->id}}">{{$mesa1->numero}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
                                    <select class="form-select {{ $errors->has('numero') ? 'is-invalid' : '' }}"
                                        aria-label="Default select example" name="id2">
                                        <option value="" selected>Selecione a mesa para jun????o</option>
                                        @foreach ($mesas as $mesa2)
                                            <option value="{{$mesa2->id}}">{{$mesa2->numero}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ $errors->first('numero') }}</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar mudan??as</button>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
