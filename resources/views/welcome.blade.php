<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Rancho do Djalma - Inicio</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i><img src="{{ asset('img/logo_branco.png') }}" width="55" height="74"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <a href="/" role="text" class="text-light"
                        style="text-decoration: none; pointer-events: unset; cursor: pointer">Rancho do Djalma</a>
                </div>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('mesas.index') }}">
                    <i class="fas fa-fw fa-chair"></i>
                    <span>Mesas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produto.index') }}">
                    <i class="fa fa-utensils"></i>
                    <span>Lista de Produtos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('relatorio.index') }}" class="nav-link">
                    <i class="fa fa-clipboard-list"></i>
                    <span>Relatorio</span>
                </a>
            </li>


            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <span class="navbar-text">
                            <button class="btn btn-outline-light active" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Fazer Login</button>
                        </span>


                        <!-- Nav Item - User Information -->
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ auth()->user()->name }}
                        </span>
                        <i class="fa fa-user"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <form method="POST" action="{{ route('auth.login.destroy') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </button>
                            </form>
                        </div>
                        </li> --}}

                    </ul>
                </nav>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Login de Usu??rio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST" action="{{ route('auth.login.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control shadow" id="email">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" name="password" class="form-control shadow-sm"
                                        id="password">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-outline-primary active shadow">Login</button>
                                    <a class="btn btn-outline-secondary shadow" role="button"
                                        href="{{ route('password.request') }}">Esqueceu sua senha ?</a>
                                </div>


                        </form>
                    </div>
                </div>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <div class="d-flex align-items-center justify-content-center">
                    @yield('session')
                </div>

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"></h1>

                    <main class="pb-5">
                        <!-- CONTE??DO -->

                    </main>

                </div>
                <!-- /.container-fluid -->
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show" id="alert" role="alert">
                    {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Quiosque Rancho do Djalma {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>

    <script>
        setTimeout(function() {
            $('#alert').remove();
        }, 3000);
    </script>
</body>

</html>
