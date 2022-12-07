<?php

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\Produto\ProdutoController;
use App\Http\Controllers\Garcom\Dashboard\DashboardController as GarcomDashboardController;
use App\Http\Controllers\Caixa\Dashboard\DashboardController as CaixaDashboardController;
use App\Http\Controllers\Mesas\MesasController;
use App\Http\Controllers\Pedido\PedidoController;
use App\Http\Controllers\Pedido\PedidoProdutoController;
use App\Http\Controllers\Relatorio\RelatorioController;
use App\Http\Controllers\QrCodeController;

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
Route::get('cardapio/{id}', [ProdutoController::class, 'cardapio'])->name('produto.cardapio');

Route::get('qr-code', [QrCodeController::class, 'index']);

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => $password
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
        );
    return $status === Password::PASSWORD_RESET
        ? redirect()->route('auth.welcome')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

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
    //Rota de pagamento
    Route::resource('pagamento', PagamentoController::class)->middleware('role:caixa');

    //Rotas para Caixa e Garçom
    Route::get('garcom/dashboard', [GarcomDashboardController::class, 'index'])->name('garcom.dashboard.index')->middleware('role:garcom');
    Route::delete('garcom/{garcom}', [GarcomDashboardController::class, 'destroy'])->name('garcom.destroy')->middleware('role:caixa');
    Route::put('garcom/desativar/{garcom}', [GarcomDashboardController::class, 'desativar'])->name('garcom.desativar');
    Route::put('garcom/ativar/{garcom}', [GarcomDashboardController::class, 'ativar'])->name('garcom.ativar');
    Route::get('caixa/dashboard', [CaixaDashboardController::class, 'index'])->name('caixa.dashboard.index')->middleware('role:caixa');


    //Rotas para Produtos
    Route::get('produto', [ProdutoController::class, 'index'])->name('produto.index');
    Route::put('produto/{produto}', [ProdutoController::class, 'esgotado'])->name('produto.esgotado');
    Route::resource('produto', ProdutoController::class)->except('index', 'esgotado')->middleware('role:caixa');


    //Rotas para Mesas
    Route::get('mesas', [MesasController::class, 'index'])->name('mesas.index');
    Route::get('mesas/create', [MesasController::class, 'create'])->name('mesas.create')->middleware('role:caixa');
    Route::get('mesas/{mesa}/edit', [MesasController::class, 'edit'])->name('mesas.edit');
    Route::post('mesa', [MesasController::class, 'store'])->name('mesas.store');
    Route::delete('mesas/{mesa}', [MesasController::class, 'destroy'])->name('mesas.destroy');
    Route::put('mesas/abrir/{mesa}', [MesasController::class, 'abrir'])->name('mesas.abrir');
    Route::put('mesas/fechar/{mesa}', [MesasController::class, 'fechar'])->name('mesas.fechar');
    Route::post('mesas', [MesasController::class, 'juntar'])->name('mesas.juntar')->middleware('role:caixa');
    Route::put('mesas/{mesa}', [MesasController::class, 'separar'])->name('mesas.separar')->middleware('role:caixa');


    //Rotas para Pedidos
    Route::get('pedidos/{id}', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::get('pedido/{pedido}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::post('pedido/{mesaid}', [PedidoController::class, 'abrir'])->name('pedidos.abrir');
    // Route::get('pedido/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::delete('pedido/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

    //Rotas para a Relação Pedidos Produtos
    Route::post('pedidos/{pedido}/produto', [PedidoProdutoController::class, 'store'])->name('pedido.produto.store');
    Route::delete('pedidos/{pedido}/produto/{produto}', [PedidoProdutoController::class, 'destroy'])->name('pedido.produto.destroy');
    Route::get('pedido/{pedido}/produto/{produto}/mais', [PedidoProdutoController::class, 'update_mais'])->name('mais.produto');
    Route::get('pedido/{pedido}/produto/{produto}/menos', [PedidoProdutoController::class, 'update_menos'])->name('menos.produto');

    // Rota Relatório
    Route::get('relatorio', [RelatorioController::class, 'index'])->name('relatorio.index');
    Route::post('relatorio/relatorio', [RelatorioController::class, 'create'])->name('relatorio.create');
    // Route::get('relatorio/show', [RelatorioController::class, 'show'])->name('relatorio.show');
});
