<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuPartidasController;
use App\Http\Controllers\AcordoController;
use App\Http\Controllers\TesteController;

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

// ACORDO
// Route::get('/acordo/acordo_list', [AcordoController::class, 'list'])->name('acordo.list');
// Route::get('/acordo/acordo_insert', [AcordoController::class, 'create'])->name('acordo.create');
// Route::post('/acordo/store', [AcordoController::class, 'store'])->name('acordo.store');
// Route::get('/acordo/acorco_edit={id}', [AcordoController::class, 'edit'])->name('acordo.edit');
// Route::post('/acordo/acorco_edit={id}/update', [AcordoController::class, 'update'])->name('acordo.update');

// teste
// Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
// Route::get('/teste/cadastrar', [TesteController::class, 'create'])->name('teste.create');
// Route::post('/teste/store', [TesteController::class, 'store'])->name('teste.store');
