<?php

use App\Http\Controllers\Auth\{
    RegisterController,
    LoginController
};
use App\Http\Controllers\Produto\ProdutoController;
use App\Http\Controllers\Caixa\Dashboard\DashboardController as CaixaDashboardController;
use App\Http\Controllers\Garcom\Dashboard\DashboardController as GarcomDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mesas\MesasController;

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

    Route::group(['middleware' => 'guest'], function () {
        Route::get('/', function () {
            return view('welcome');
        })->name('welcome');
        Route::get('login', [LoginController::class, 'create'])->name('login.create');
        Route::post('login', [LoginController::class, 'store'])->name('login.store');
    });
    Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('role:caixa');
    Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('role:caixa');

    Route::post('logout', [LoginController::class, 'destroy'])->name('login.destroy')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('garcom/dashboard', [GarcomDashboardController::class, 'index'])->name('garcom.dashboard.index')->middleware('role:garcom');

    Route::get('caixa/dashboard', [CaixaDashboardController::class, 'index'])->name('caixa.dashboard.index')->middleware('role:caixa');

    Route::resource('produto', ProdutoController::class)
        ->middleware('role:caixa');

    Route::get('mesas', [MesasController::class, 'index'])->name('mesas.index')
    ->middleware('role:garcom');

    Route::get('mesas', [MesasController::class, 'create'])->name('mesas.create')
    ->middleware('role:garcom');

    Route::get('mesas/{mesa}/edit',[MesaController::class, 'edit'])-> name('mesas.edit');

    Route::post('mesas', [MesasController::class, 'store'])-> name('mesas.store');
});
