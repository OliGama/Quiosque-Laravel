@extends('layouts.panelguest')

@section('content')
    <div class="d-flex flex-wrap">
        @for($i=1; $i<11; $i++)
            <div class="p-5 border-1 m-3 shadow rounded bg-white">
                <h3 class="text-center bold">Mesa {{$i}}</h3>
                {{QrCode::size(150)->generate(route('produto.cardapio', $i))}}
            </div>
        @endfor
    </div>
@endsection
