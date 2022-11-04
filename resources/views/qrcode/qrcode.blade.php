@extends('layouts.panelguest')

@section('content')
    <div class="card-body">
        <span>Mesa 1</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 1)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 2</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 2)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 3</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 3)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 4</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 4)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 5</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 5)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 6</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 6)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 7</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 7)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 8</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 8)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 9</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 9)) !!}
    </div>
    <div class="card-body">
        <span>Mesa 10</span>
        {!! QrCode::size(150)->generate(route('produto.cardapio', 10)) !!}
    </div>
@endsection
