@extends('layouts.panel')
@section('title', 'Dashboard')
@section('menuTitle')
    <a href="{{ route('caixa.dashboard.index') }}" role="text" class="text-light"
        style="text-decoration: none; pointer-events: unset; cursor: pointer">Quisque Laravel</a>
@endsection
@section('session')
    @if (session()->has('success'))
        <div class="alert-success col-4 align-items-center justify-content-center" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert-warning col-4 align-items-center justify-content-center" data-bs-dismiss="alert" role="alert">
            {{ session('warning') }}
        </div>
    @endif
@endsection
@section('content')
    Dashboard do Caixa

    <div class="col">
        <button class="btn btn-outline-primary active" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Cadastrar Garçom</button>
        <!-- <a class="btn btn-primary" role="button"  href="{{ route('auth.register.create') }}">Cadastrar Garçom</a> -->

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
