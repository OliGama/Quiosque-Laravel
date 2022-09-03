@extends('layouts.panel')
@section('title', 'Dashboard')
@section('menuTitle')
    <a href="{{ route('garcom.dashboard.index') }}" role="text" class="text-light"
        style="text-decoration: none; pointer-events: unset; cursor: pointer">Quiosque Laravel</a>
@endsection
@section('content')
        Dashboard do Garçom
@endsection
