<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuPartidasController;
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

// ROTAS PARA TELA DE PARTIDAS
Route::get('/partidas/listagem', [MenuPartidasController::class, 'index'])->name('partidas.index');
Route::get('/partidas/inserir_partida', [MenuPartidasController::class, 'create'])->name('partidas.inserir_partida');
Route::post('/partidas/store', [MenuPartidasController::class, 'store'])->name('partidas.store');
Route::get('/partidas/delete_all', [MenuPartidasController::class, 'delete'])->name('partidas.delete');

// teste
// Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
// Route::get('/teste/cadastrar', [TesteController::class, 'create'])->name('teste.create');
// Route::post('/teste/store', [TesteController::class, 'store'])->name('teste.store');
