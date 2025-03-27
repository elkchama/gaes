<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function showLoginForm()
    {
        // Retorna la vista que contiene el formulario de login.
        return view('auth.login'); // Asegúrate de tener esta vista en resources/views/auth/login.blade.php
    }

    /**
     * Procesa el inicio de sesión.
     */
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar al usuario con las credenciales
        if (Auth::attempt($credentials)) {
            // Regeneramos la sesión para evitar ataques de fijación de sesión.
            $request->session()->regenerate();

            // Redirigir al usuario a la ruta dashboard (o a la que necesites)
            return redirect()->intended(route('dashboard'))->with('success', 'Inicio de sesión exitoso.');
        }

        // Si la autenticación falla, se redirige de vuelta al formulario con un mensaje de error.
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput();
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidamos la sesión y regeneramos el token CSRF.
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Has cerrado sesión correctamente.');
    }
}
