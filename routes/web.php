<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NacionalidadeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\AtorController;
use App\Http\Controllers\FilmeController;

Route::get('/', function () {
    return redirect()->route('relatorios.atores_filmes');
});

Route::resource('nacionalidades', NacionalidadeController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('idiomas', IdiomaController::class);
Route::resource('filmes', FilmeController::class);
Route::resource('atores', AtorController::class)->parameters(['atores' => 'ator']);

Route::get('/relatorios/atores-filmes', [AtorController::class, 'relatorio'])->name('relatorios.atores_filmes');