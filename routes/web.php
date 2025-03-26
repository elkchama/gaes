<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RegistroController; // Asegurar correcta importación

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
Route::resource('registros', RegistroController::class);


