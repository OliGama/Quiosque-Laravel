@extends('layouts.panel')
@section('title', 'Dashboard')
@section('content')
        Dashboard do Caixa
        <div class="text-center">
            <a class="btn btn-primary" role="button" href="{{ route('auth.register.create') }}">Não tem uma conta? Cadastre-se!</a>
        </div>
@endsection

