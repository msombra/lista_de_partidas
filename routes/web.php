<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuPartidasController;
use App\Http\Controllers\TimesController;
use App\Http\Controllers\AcordoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\PushRmsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function() {
    return view('pages.home.index');
});

// PARTIDAS
Route::get('/partidas/listagem', [MenuPartidasController::class, 'index'])->name('partidas.index');
Route::get('/partidas/inserir_partida', [MenuPartidasController::class, 'create'])->name('partidas.inserir_partida');
Route::post('/partidas/store', [MenuPartidasController::class, 'store'])->name('partidas.store');
Route::get('/partidas/editar_partida={id}', [MenuPartidasController::class, 'edit'])->name('partidas.editar_partida');
Route::post('/partidas/update={id}', [MenuPartidasController::class, 'update'])->name('partidas.update');
Route::delete('/partidas/delete_one={id}', [MenuPartidasController::class, 'deleteOne'])->name('partidas.deletar_partida');
Route::get('/partidas/delete_all', [MenuPartidasController::class, 'deleteAll'])->name('partidas.limpar_tudo');
// times
Route::get('/partidas/times_list', [TimesController::class, 'list'])->name('partidas.times_list');
Route::get('/partidas/times_insert', [TimesController::class, 'create'])->name('partidas.times_insert');
Route::post('/partidas/times_store', [TimesController::class, 'store'])->name('partidas.times_store');
Route::get('/partidas/times_edit={id}', [TimesController::class, 'edit'])->name('partidas.times_edit');
Route::post('/partidas/times_update={id}', [TimesController::class, 'update'])->name('partidas.times_update');
Route::delete('/partidas/times_delete={id}', [TimesController::class, 'delete'])->name('partidas.times_delete');

// PUSH RMS
Route::get('/push_rms', [PushRmsController::class, 'index'])->name('push_rms.index');

// teste
// Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
// Route::get('/teste/cadastrar', [TesteController::class, 'create'])->name('teste.create');
// Route::post('/teste/store', [TesteController::class, 'store'])->name('teste.store');
