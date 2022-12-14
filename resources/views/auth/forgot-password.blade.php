<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Esqueceu a senha</title>
	<link rel="stylesheet" href="{{  asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center align-items-center h-100">
				<div class="card-wrapper">

					<div class="cardx fat">
						<div class="card-body">
							<h4 class="card-title">Esqueceu sua senha?</h4>
							<form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
                                @csrf

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
								<div class="form-group">
									<label for="email">Hahahaha muito burro</label>
									<input id="email" type="email" class="form-control shadow" name="email" value="{{ old('email') }}" placeholder="Escreva seu email">
                                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block shadow">
										Enviar link para redefinir senha
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
