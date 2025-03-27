<?php

namespace App\Http\Controllers;

use App\Models\Registros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrosController extends Controller
{
    /**
     * Muestra una lista de los registros.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registros::all();
        return view('registro.index', compact('registros'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.create');
    }

    /**
     * Almacena un registro recién creado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de datos. Se utiliza "confirmed" para verificar que contraseña y contraseña_confirmation coincidan.
        $validated = $request->validate([
            'nombre_completo'   => 'required|string|max:255',
            'nombre_usuario'    => 'required|string|max:255|unique:registros,nombre_usuario',
            'correo_electronico'=> 'required|email|unique:registros,correo_electronico',
            'numero_telefono'   => 'required|string|max:20',
            'contraseña'        => 'required|string|min:6|confirmed',
            'genero'            => 'required|string|max:50',
        ]);

        // Se crea el registro, almacenando la contraseña encriptada.
        $registro = Registros::create([
            'id_usuario'        => Auth::id(), // Se asigna automáticamente
            'nombre_completo'   => $validated['nombre_completo'],
            'nombre_usuario'    => $validated['nombre_usuario'],
            'correo_electronico'=> $validated['correo_electronico'],
            'numero_telefono'   => $validated['numero_telefono'],
            'contraseña'        => Hash::make($validated['contraseña']),
            'genero'            => $validated['genero'],
        ]);

        return redirect()->route('registros.index')->with('success', 'Registro creado exitosamente');
    }

    /**
     * Muestra el registro especificado.
     *
     * @param  \App\Models\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function show(Registros $registros)
    {
        return view('registros.show', compact('registros'));
    }

    /**
     * Muestra el formulario para editar el registro especificado.
     *
     * @param  \App\Models\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function edit(Registros $registros)
    {
        return view('registros.edit', compact('registros'));
    }

    /**
     * Actualiza el registro especificado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registros $registros)
    {
        $validated = $request->validate([
            'id_usuario'        => 'required|exists:usuarios,id_usuario',
            'nombre_completo'   => 'required|string|max:255',
            'nombre_usuario'    => 'required|string|max:255|unique:registros,nombre_usuario,' . $registros->id_registro . ',id_registro',
            'correo_electronico'=> 'required|email|unique:registros,correo_electronico,' . $registros->id_registro . ',id_registro',
            'numero_telefono'   => 'required|string|max:20',
            'contraseña'        => 'nullable|string|min:6|confirmed',
            'genero'            => 'required|string|max:50',
        ]);

        $registros->id_usuario = $validated['id_usuario'];
        $registros->nombre_completo = $validated['nombre_completo'];
        $registros->nombre_usuario = $validated['nombre_usuario'];
        $registros->correo_electronico = $validated['correo_electronico'];
        $registros->numero_telefono = $validated['numero_telefono'];
        $registros->genero = $validated['genero'];

        // Solo actualizamos la contraseña si se ha proporcionado.
        if (!empty($validated['contraseña'])) {
            $registros->contraseña = Hash::make($validated['contraseña']);
        }

        $registros->save();

        return redirect()->route('registros.index')->with('success', 'Registro actualizado exitosamente');
    }

    /**
     * Elimina el registro especificado de la base de datos.
     *
     * @param  \App\Models\Registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registros $registros)
    {
        $registros->delete();
        return redirect()->route('registros.index')->with('success', 'Registro eliminado exitosamente');
    }
}
