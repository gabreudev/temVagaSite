<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DenunciaController;

// Agrupando rotas protegidas com middleware 'auth'
Route::middleware(['auth'])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('postagens', PostagemController::class)->except('index', 'show');
    Route::resource('denuncias', DenunciaController::class);
    
});
// Rota para visualizar detalhes de um usuário
Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Rotas de login e logout (não precisam de autenticação)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
