@extends('layouts.app')
@section('title')
    Tela de criação
@endsection
@section('content')
    <h1 class="text-center my-4">Criar conta</h1>

    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                type="email"
                                name="user[email]"
                                class="form-control {{$errors->has('user.email') ? 'is-invalid' : ''}}"
                                placeholder="Nome do produto"
                                value="{{old('user.email')}}"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.email')}}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input
                                type="password"
                                name="user[password]"
                                class="form-control {{$errors->has('user.password') ? 'is-invalid' : ''}}"
                                placeholder="Quantidade"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.password')}}</div>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex  align-center justify-center">
                        <div class="form-group">
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Dropdown link
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="#">Action</a>
                                  <a class="dropdown-item" href="#">Another action</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block mt-3">Criar conta</button>
            </form>
        </div>
    </div>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/auth/register.js')}}"></script>
@endsection
