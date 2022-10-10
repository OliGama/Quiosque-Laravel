<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiosque do Djalma - Recuperar senha</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>

<body>


    <h1 class="text-center text-dark my-4">Recuperar senha</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow my-4 mx-auto">
                    <div class="card-body">
                        <form action="{{ route('password.email') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <span class="text d-flex">E-mail cadastrado</span>
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} shadow"
                                            placeholder="Inserir e-mail">
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3 shadow">
                                Enviar link de verificação
                            </button>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
