<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rancho do Djalma - Login</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>

<body>
    <h1 class="text-center text-dark my-4">Login</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">

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


                <div class="card shadow my-4 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('auth.login.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <span class="text d-flex">E-mail</span>
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} shadow"
                                            placeholder="Inserir e-mail" value="{{ old('email') }}">
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <span class="text d-flex">Senha</span>
                                        <input type="password" name="password"
                                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }} shadow"
                                            placeholder="Inserir senha">
                                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                    </div>
                                </div>
                            </div>
                            <a style="color: black" href="{{ route('password.request') }}">Esqueceu sua senha ?</a>
                            <button type="submit" class="btn btn-primary btn-block mt-3 shadow">
                                Login
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
