@extends('layouts.panel')
@section('title', 'Dashboard')
@section('content')
        Dashboard do Caixa
        @if (session()->has('success'))
            <div class="alert-success">
                {{ session('success') }}
             </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert-warning">
                 {{ session('warning') }}
             </div>
        @endif
        <div class="text-center">
            <a class="btn btn-primary" role="button" href="{{ route('auth.register.create') }}">Não tem uma conta? Cadastre-se!</a>
        </div>
@endsection

