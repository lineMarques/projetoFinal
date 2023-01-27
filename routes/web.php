<?php

use App\Http\Controllers\{
    HomeController,
    PostController
};
use Illuminate\Support\Facades\Route;

/* Rotas para PostController */

Route::get('/noticias', [PostController::class, 'index'])->name('noticias.index');

Route::post('/noticias', [PostController::class, 'store'])->name('noticias.store');

Route::get('/noticias/{id}', [PostController::class, 'show'])->name('noticias.show');

Route::put('/noticias', [PostController::class, 'update'])->name('noticias.update');

Route::put('/noticias', [PostController::class, 'destroy'])->name('noticias.destroy');

/* Rotas para HomeController */

Route::get('/home', [HomeController::class, 'index'])->name('home');


Auth::routes();
