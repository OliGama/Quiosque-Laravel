@extends('layouts.panel')
@section('title')
    Tela de edição
@endsection
@section('content')
    <form action="{{ route('produto.update', $produto->id) }}" method="POST" autocomplete="off">
        @method('PUT')
        @include('organization.events._partials.form')
    </form>
@endsection
