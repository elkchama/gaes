<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegistrosController; // Importar RegistrosController
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Ruta principal (Página de bienvenida)
Route::get('/', function () {
    return view('welcome');
});

// 👤 Rutas para Usuarios
Route::resource('usuarios', UsuariosController::class);

// 🔑 Rutas para Roles
Route::resource('roles', RolesController::class);

// 📜 Rutas para Registros
Route::resource('registros', RegistrosController::class);


// Ruta para mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');



