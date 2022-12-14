@extends('layouts.panel')
@section('title', 'Dashboard')
{{-- @section('menuTitle')
    <a href="{{ route('caixa.dashboard.index') }}" role="text" class="text-light"
        style="text-decoration: none; pointer-events: unset; cursor: pointer">Quiosque Laravel</a>
@endsection --}}
@section('title2')
    <div class="d-flex justify-content-center text-dark">
        <span>Lista de Garçons</span>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="container d-flex justify-content-end">
                    <button class="btn btn-outline-primary active shadow" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Cadastrar Garçom</button>
                </div>
            </div>
        </div>
    </div>
    <br>

    @foreach ($garcons as $garcom)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{ $garcom->name }} @if ($garcom->ativo == false)
                            (desativado)
                        @endif
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <li class="container-fluid">{{ $garcom->email }}
                                <div class="col d-flex justify-content-end gap-2">
                                    <form method="POST" action="{{ route('garcom.destroy', $garcom) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger shadow" type="submit">Deletar</button>
                                    </form>
                                    @if ($garcom->ativo == false)
                                        <form method="POST" action="{{ route('garcom.ativar', $garcom) }}">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary shadow">
                                                Ativar
                                            </button>
                                        </form>
                                    @elseif ($garcom->ativo == true)
                                        <form method="POST" action="{{ route('garcom.desativar', $garcom) }}">
                                            @method('put')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary shadow ">
                                                Desativar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Cadastrar Garçom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form method="POST" action="{{ route('auth.register.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                value="{{ old('email') }}" id="email" placeholder="Email">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                value="{{ old('name') }}" id="name" placeholder="Nome">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password"
                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"
                                placeholder="Senha">
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation" placeholder="Confirmar Senha">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary active">Registrar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
