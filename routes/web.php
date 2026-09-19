<?php

use App\Http\Controllers\ArquivoController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\ConsultaExpedienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DespachoController;
use App\Http\Controllers\EstadoExpedienteController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\TramitacaoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Gestão de Utilizadores
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:gerir_utilizadores'])->group(function () {

    Route::get('/utilizadores', [UserController::class, 'index'])
        ->name('utilizadores.index');

    Route::get('/utilizadores/criar', [UserController::class, 'create'])
        ->name('utilizadores.create');

    Route::post('/utilizadores', [UserController::class, 'store'])
        ->name('utilizadores.store');

    Route::get('/utilizadores/{user}/editar', [UserController::class, 'edit'])
        ->name('utilizadores.edit');

    Route::put('/utilizadores/{user}', [UserController::class, 'update'])
        ->name('utilizadores.update');

    Route::patch('/utilizadores/{user}/estado', [UserController::class, 'toggleEstado'])
        ->name('utilizadores.toggle-estado');
});

/*
|--------------------------------------------------------------------------
| Gestão de Expedientes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:registar_expediente'])->get(
    '/expedientes/criar',
    [ExpedienteController::class, 'create']
)->name('expedientes.create');

Route::middleware(['auth', 'permission:registar_expediente'])->post(
    '/expedientes',
    [ExpedienteController::class, 'store']
)->name('expedientes.store');

Route::middleware(['auth', 'permission:consultar_expediente'])->get(
    '/expedientes/{expediente}',
    [ConsultaExpedienteController::class, 'show']
)->name('expedientes.show');

Route::middleware(['auth', 'permission:tramitar_expediente'])->get(
    '/expedientes/{expediente}/tramitar',
    function (\App\Models\Expediente $expediente) {
        return view('expedientes.tramitar', compact('expediente'));
    }
)->name('expedientes.tramitar.form');

Route::middleware(['auth', 'permission:tramitar_expediente'])->post(
    '/expedientes/{expediente}/tramitar',
    [TramitacaoController::class, 'store']
)->name('expedientes.tramitar');

Route::middleware(['auth', 'permission:tramitar_expediente'])->post(
    '/expedientes/{expediente}/enviar-para-despacho',
    [EstadoExpedienteController::class, 'enviarParaDespacho']
)->name('expedientes.enviar-para-despacho');

Route::middleware(['auth', 'permission:registar_despacho'])->get(
    '/expedientes/{expediente}/despachar',
    function (\App\Models\Expediente $expediente) {
        return view('expedientes.despachar', compact('expediente'));
    }
)->name('expedientes.despachar.form');

Route::middleware(['auth', 'permission:registar_despacho'])->post(
    '/expedientes/{expediente}/despachar',
    [DespachoController::class, 'store']
)->name('expedientes.despachar');

Route::middleware(['auth', 'permission:arquivar_expediente'])->post(
    '/expedientes/{expediente}/arquivar',
    [ArquivoController::class, 'store']
)->name('expedientes.arquivar');

/*
|--------------------------------------------------------------------------
| Auditoria
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:consultar_auditoria'])->get(
    '/auditoria',
    [AuditoriaController::class, 'index']
)->name('auditoria.index');

/*
|--------------------------------------------------------------------------
| Relatórios
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:consultar_relatorios'])->get(
    '/relatorios',
    [RelatorioController::class, 'index']
)->name('relatorios.index');

require __DIR__.'/auth.php';
