<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostagemController;
use App\Http\Controllers\LoginController;


Route::resource('usuarios', UsuarioController::class);

Route::resource('categorias', CategoriaController::class);

Route::resource('postagens', PostagemController::class);

// Rota de exibição do formulário de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rota de login (envio do formulário)
Route::post('/login', [LoginController::class, 'login']);

// Rota para logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');