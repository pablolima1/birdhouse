<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContasController;
use App\Http\Controllers\ModalidadeController;
use App\Http\Controllers\ModalidadePagamentoController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('conta')->group(function () {
	Route::get('/cadastrar', [ContasController::class, 'index'])->name('conta.index');
	Route::get('/cadastrar/create', [ContasController::class, 'create'])->name('conta.create');
	Route::post('/cadastrar/store', [ContasController::class, 'store'])->name('conta.store');
	Route::get('/pendentes', [ContasController::class, 'pendentes'])->name('conta.pendentes');
});

Route::prefix('modalidade')->group(function () {
    Route::get('/cadastrar', [ModalidadeController::class, 'index'])->name('modalidade.index');
    Route::get('/cadastrar/create', [ModalidadeController::class, 'create'])->name('modalidade.create');
    Route::post('/cadastrar/store', [ModalidadeController::class, 'store'])->name('modalidade.store');
});

Route::prefix('modalidade-pagamento')->group(function () {
    Route::get('/cadastrar', [ModalidadePagamentoController::class, 'index'])->name('modalidade-pagamento.index');
    Route::get('/cadastrar/create', [ModalidadePagamentoController::class, 'create'])->name('modalidade-pagamento.create');
    Route::post('/cadastrar/store', [ModalidadePagamentoController::class, 'store'])->name('modalidade-pagamento.store');
});
