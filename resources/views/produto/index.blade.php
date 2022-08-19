<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin-2.min.css')}}">
</head>
<body>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="text"
                                name="user[cpf]"
                                class="form-control cpf {{$errors->has('user.cpf') ? 'is-invalid' : ''}}"
                                placeholder="Tipo de produto"
                                value="{{old('user.cpf')}}"
                            >
                            <div class="invalid-feedback">{{$errors->first('user.cpf')}}</div>
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
</body>
</html>
