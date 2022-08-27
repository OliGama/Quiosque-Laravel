@extends('layouts.panel')
@section('title')
    Cadastrar produto
@endsection

@section('title2')
    <div class="title d-flex justify-content-center" style="color: black">
        Inserir produto
    </div>
@endsection

@section('content')
    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form method="POST" action="{{route('produto.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="nome_produto"
                                name="nome_produto"
                                class="form-control {{$errors->has('nome_produto') ? 'is-invalid' : ''}}"
                                placeholder="Nome do produto"
                                value="{{old('nome_produto')}}"
                            >
                            <div class="invalid-feedback">{{$errors->first('nome_produto')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input
                                type="preco"
                                name="preco"
                                class="form-control preco {{$errors->has('preco') ? 'is-invalid' : ''}}"
                                placeholder="Preço"
                                value="{{old('preco')}}"
                            >
                            <div class="invalid-feedback">{{$errors->first('preco')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input
                                type="tipo_produto"
                                name="tipo_produto"
                                class="form-control {{$errors->has('tipo_produto') ? 'is-invalid' : ''}}"
                                placeholder="Tipo do produto"
                                value="{{old('tipo_produto')}}"
                            >
                            <div class="invalid-feedback">{{$errors->first('tipo_produto')}}</div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">Inserir produto</button>
            </form>
        </div>
    </div>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/auth/register.js')}}"></script>
@endsection
