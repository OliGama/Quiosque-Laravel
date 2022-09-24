<?php

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Produto\ProdutoController;
use App\Http\Controllers\Garcom\Dashboard\DashboardController as GarcomDashboardController;
use App\Http\Controllers\Caixa\Dashboard\DashboardController as CaixaDashboardController;
use App\Http\Controllers\Cozinha\CozinhaController;
use App\Http\Controllers\Mesas\MesasController;
use App\Http\Controllers\Pedido\PedidoController;
use App\Http\Controllers\Pedido\PedidoProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'auth.'], function () {
    //Rotas livres para todos visitantes
    Route::group(['middleware' => 'guest'], function () {


        //Rota para Welcome
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');


        //Rotas para Login
        Route::get('login', [LoginController::class, 'create'])->name('login.create');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });
    //Rotas protegidas


    //Rotas para Register
    Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('role:caixa');
    Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('role:caixa');


    //Rota para Logout
    Route::post('logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {


    //Rotas para Caixa e Garçom
    Route::get('garcom/dashboard', [GarcomDashboardController::class, 'index'])->name('garcom.dashboard.index')->middleware('role:garcom');
    Route::delete('garcom/{garcom}', [GarcomDashboardController::class, 'destroy'])->name('garcom.destroy')->middleware('role:caixa');
    Route::put('garcom/desativar/{garcom}', [GarcomDashboardController::class, 'desativar'])->name('garcom.desativar');
    Route::put('garcom/ativar/{garcom}', [GarcomDashboardController::class, 'ativar'])->name('garcom.ativar');
    Route::get('caixa/dashboard', [CaixaDashboardController::class, 'index'])->name('caixa.dashboard.index')->middleware('role:caixa');


    //Rotas para Produtos
    Route::get('produto', [ProdutoController::class, 'index'])->name('produto.index');
    Route::resource('produto', ProdutoController::class)->except('index')->middleware('role:caixa');


    //Rotas para Mesas
    Route::get('mesas', [MesasController::class, 'index'])->name('mesas.index');
    Route::get('mesas/create', [MesasController::class, 'create'])->name('mesas.create')->middleware('role:caixa');
    Route::get('mesas/{mesa}/edit', [MesasController::class, 'edit'])->name('mesas.edit');
    Route::post('mesas', [MesasController::class, 'store'])->name('mesas.store');
    Route::delete('mesas/{mesa}', [MesasController::class, 'destroy'])->name('mesas.destroy');
    Route::put('mesas/abrir/{mesa}', [MesasController::class, 'abrir'])->name('mesas.abrir');
    Route::put('mesas/fechar/{mesa}', [MesasController::class, 'fechar'])->name('mesas.fechar');


    //Rotas para Pedidos
    Route::post('pedidos/{id}', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::get('pedido/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get('pedido/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::delete('pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

    //Rotas para a Relação Pedidos Produtos
    Route::post('pedidos/{pedido}/produto', [PedidoProdutoController::class, 'store'])->name('pedido.produto.store');
    Route::delete('pedidos/{pedido}/produto/{produto}', [PedidoProdutoController::class, 'destroy'])->name('pedido.produto.destroy');


    //Rotas para Cozinha
    Route::get('cozinha', [CozinhaController::class, 'index'])->name('cozinha.index'); //->middleware('role:cozinha');
});
