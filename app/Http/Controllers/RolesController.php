<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Mostrar todos los roles.
     */
    public function index()
    {
        $roles = Roles::all();
        return response()->json($roles);
    }

    /**
     * Guardar un nuevo rol.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:20|unique:roles,nombre',
        ]);

        $rol = Roles::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json(['message' => 'Rol creado con éxito', 'rol' => $rol], 201);
    }

    /**
     * Mostrar un rol por su ID.
     */
    public function show($id)
    {
        $rol = Roles::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        return response()->json($rol);
    }

    /**
     * Actualizar un rol.
     */
    public function update(Request $request, $id)
    {
        $rol = Roles::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        $request->validate([
            'nombre' => "sometimes|string|max:20|unique:roles,nombre,$id,$rol->id_rol",
        ]);

        $rol->update([
            'nombre' => $request->nombre ?? $rol->nombre,
        ]);

        return response()->json(['message' => 'Rol actualizado', 'rol' => $rol]);
    }

    /**
     * Eliminar un rol.
     */
    public function destroy($id)
    {
        $rol = Roles::find($id);

        if (!$rol) {
            return response()->json(['message' => 'Rol no encontrado'], 404);
        }

        $rol->delete();

        return response()->json(['message' => 'Rol eliminado']);
    }
}

