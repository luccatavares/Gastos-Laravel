<?php

use App\Http\Controllers\GastoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/gasto', [GastoController::class, 'index'])->name('indexGasto');
Route::get('/gasto/cadastro', [GastoController::class, 'create'])->name('createGasto');
Route::post('/gasto', [GastoController::class, 'store'])->name('storeGasto');
Route::get('/gasto/editar/{id}', [GastoController::class, 'edit'])->name('editGasto');
Route::get('/gasto/deletar/{id}', [GastoController::class, 'destroy'])->name('destroyGasto');
Route::post('/gasto/atualizar/{id}', [GastoController::class, 'update'])->name('updateGasto');
Route::get('/gasto/procurar', [GastoController::class, 'procurarGasto'])->name('procurarGasto');


