@extends('layouts.panelguest')
@section('title')
    Cardápio
@endsection
@section('title2')
    <div class="d-flex justify-content-center text-dark">
        Lista de Produtos
    </div>
@endsection
@section('content')
<table class="table table-hover">
    <thead>
        <tr class="text-dark" style="background-color: rgb(230, 228, 228)">
            <th scope="col">Nome do Produto</th>
            <th scope="col">Tipo</th>
            <th scope="col">Preço (R$)</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($produtos as $produto)
            <tr class="text-dark">
                <td>{{ $produto->nome_produto }}</td>
                <td>{{ $produto->tipo_produto }}</td>
                @if ($produto->esgotado == false)
                    <td>R$ {{ number_format($produto->preco, 2, ",") }}</td>
                @else
                    <td style="color:crimson">Produto Esgotado</td>
                @endif

        @empty
            <tr>
                <td colspan="5" class="text-center text-dark">Não há dados no momento</td>
            </tr>
        @endforelse
    </tbody>
</table>

{{$produtos->withQueryString()->links()}}
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/Produto/mask.js') }}"></script>

@endsection
