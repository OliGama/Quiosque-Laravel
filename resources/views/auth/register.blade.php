<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rancho do Djalma - Cadastro</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>

<body>
    <h1 class="text-center text-dark my-4">Cadastrar Garçom</h1>
    <div class="card shadow my-5 w-75 mx-auto">
        <div class="card-body">
            <form action="{{ route('auth.register.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <span class="text d-flex">Nome</span>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                placeholder="Inserir nome" value="{{ old('name') }}">
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <span class="text d-flex">E-mail</span>
                            <input type="email" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Inserir e-mail" value="{{ old('email') }}">
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <span class="text d-flex">Senha</span>
                            <input type="password" name="password"
                                class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder="Inserir senha">
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <span class="text d-flex">Confirmar senha</span>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirmar Senha">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-3">Criar Conta</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
</body>

</html>
