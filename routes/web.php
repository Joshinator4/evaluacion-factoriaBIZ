<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('main', [MainController::class,'index'])->name('main.index')->middleware('auth');

Route::resource('productos',ProductoController::class)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('categorias',CategoriaController::class);
    // Métodos adicionales de ruta categorias
    Route::put('/categorias/{categoria}/desvincular-todos', [CategoriaController::class, 'desvincularProductosDeCategoria'])->name('categorias.desvincularProductosDeCategoria');
    Route::put('/categorias/{categoria}/desvincular', [CategoriaController::class, 'desvincularProductoDeCategoriaPorId'])->name('categorias.desvincularProductoDeCategoriaPorId');
});

Route::resource('clientes',ClienteController::class)->except('index')->middleware('auth');

require __DIR__.'/auth.php';
