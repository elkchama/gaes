<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Mostrar todos los usuarios.
     */
    public function index()
{
    $usuarios = Usuarios::with('rol')->get();
    return view('usuarios.index', compact('usuarios'));
}

    /**
     * Guardar un nuevo usuario.
     */
    public function store(Request $request)
{
    dd($request->all()); // Esto detiene la ejecución y muestra los datos enviados.
    $request->validate([
        'nombre'     => 'required|string|max:100',
        'apellido'   => 'required|string|max:100',
        'correo'     => 'required|email|max:150|unique:usuarios,correo',
        'contrasena' => 'required|string|min:6',
        'telefono'   => 'nullable|string|max:20',
        'direccion'  => 'nullable|string|max:100',
        'id_rol'     => 'nullable|exists:roles,id_rol',
    ]);

    $usuario = Usuarios::create([
        'nombre'     => $request->nombre,
        'apellido'   => $request->apellido,
        'correo'     => $request->correo,
        'contrasena' => bcrypt($request->contrasena),
        'telefono'   => $request->telefono,
        'direccion'  => $request->direccion,
        // Asigna el id_rol enviado o, en caso contrario, un valor por defecto (por ejemplo, 1)
        'id_rol'     => $request->id_rol ?? 1,
    ]);

    return response()->json(['message' => 'Usuario creado con éxito', 'usuario' => $usuario], 201);
}

    /**
     * Mostrar un usuario por su ID.
     */
    public function show($id)
    {
        $usuario = Usuarios::with('rol')->find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    /**
     * Actualizar un usuario.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'nombre'     => 'sometimes|string|max:100',
            'apellido'   => 'sometimes|string|max:100',
            'correo'     => "sometimes|email|max:150|unique:usuarios,correo,$id,id_usuario",
            'contrasena' => 'nullable|string|min:6',
            'telefono'   => 'nullable|string|max:20',
            'direccion'  => 'nullable|string|max:100',
            'id_rol'     => 'sometimes|exists:roles,id_rol', // Corrección en la validación
        ]);

        $usuario->update([
            'nombre'     => $request->nombre ?? $usuario->nombre,
            'apellido'   => $request->apellido ?? $usuario->apellido,
            'correo'     => $request->correo ?? $usuario->correo,
            'contrasena' => $request->filled('contrasena') ? bcrypt($request->contrasena) : $usuario->contrasena,
            'telefono'   => $request->telefono ?? $usuario->telefono,
            'direccion'  => $request->direccion ?? $usuario->direccion,
            'id_rol'     => $request->id_rol ?? $usuario->id_rol,
        ]);

        return response()->json(['message' => 'Usuario actualizado', 'usuario' => $usuario]);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
