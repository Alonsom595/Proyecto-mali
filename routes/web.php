<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuejasSugerenciasController;

// Ruta principal
Route::get('/', function () {
    return view('Layouts.app2');
});

// Rutas para Quejas y Sugerencias
Route::get('/quejassugerencias', [QuejasSugerenciasController::class, 'index'])->name('QuejasSugerencias.index');
Route::get('/quejassugerencias/create', [QuejasSugerenciasController::class, 'create'])->name('QuejasSugerencias.create');
Route::post('/quejassugerencias', [QuejasSugerenciasController::class, 'store'])->name('QuejasSugerencias.store');
Route::get('/quejassugerencias/{quejasSugerencia}', [QuejasSugerenciasController::class, 'show'])->name('QuejasSugerencias.show');
Route::get('/quejassugerencias/{quejasSugerencia}/edit', [QuejasSugerenciasController::class, 'edit'])->name('QuejasSugerencias.edit');
Route::put('/quejassugerencias/{quejasSugerencia}', [QuejasSugerenciasController::class, 'update'])->name('QuejasSugerencias.update');
Route::delete('/quejassugerencias/{quejasSugerencia}', [QuejasSugerenciasController::class, 'destroy'])->name('QuejasSugerencias.destroy');

// Auth routes
require __DIR__.'/auth.php';