@extends('layouts.panel')
@section('title', 'Mesas')
@section('content')
<form method="GET" action="{{ route('mesas.store') }}">
    @csrf
    @foreach ($mesas as $mesa)
    <div class="container-fluid">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$mesa->numero}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">@if ($mesa->ocupada == 0)
                    Vazia
                    @elseif ($mesa->ocupada == 1)
                    Ocupada
                    @endif
                </h6>
                <p class="card-text"></p>
                <a href="#" class="card-link">Fazer Pedido</a>
                @if ($mesa->ocupada == 0)
                <form action="post" action="{{ route('mesas.edit')}}">
                    <button type="submit" class="btn btn-success">
                        Abrir Mesa
                    </button>
                </form>
                @else ($mesa->ocupada == 1)
                <form method="POST" action="{{ route('mesas.destroy', $mesa->id) }}">
                    <button type="submit" class="btn btn-sm btn-danger">
                        Fechar Mesa
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</form>
@endsection