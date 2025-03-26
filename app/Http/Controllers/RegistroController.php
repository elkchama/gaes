<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Muestra la lista de registros en una vista.
     */
    public function index()
    {
        $registros = Registro::all();
        return view('registro.index', compact('registros'));
    }

    /**
     * Muestra el formulario para crear un nuevo registro.
     */
    public function create()
    {
        return view('registros.create');
    }

    /**
     * Almacena un nuevo registro en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'usuario_id'      => 'required|exists:usuarios,id_usuario',
            'ip_registro'     => 'nullable|string|max:45',
            'metodo_registro' => 'required|in:email,google,facebook',
            'verificado'      => 'boolean'
        ]);

        Registro::create($validated);

        return redirect()->route('registros.index')
            ->with('success', 'Registro creado exitosamente.');
    }

    /**
     * Muestra el detalle de un registro.
     */
    public function show($id)
    {
        $registro = Registro::findOrFail($id);
        return view('registros.show', compact('registro'));
    }

    /**
     * Muestra el formulario para editar un registro.
     */
    public function edit($id)
    {
        $registro = Registro::findOrFail($id);
        return view('registros.edit', compact('registro'));
    }

    /**
     * Actualiza un registro existente.
     */
    public function update(Request $request, $id)
    {
        $registro = Registro::findOrFail($id);

        $validated = $request->validate([
            'ip_registro'     => 'nullable|string|max:45',
            'metodo_registro' => 'in:email,google,facebook',
            'verificado'      => 'boolean'
        ]);

        $registro->update($validated);

        return redirect()->route('registros.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Elimina un registro.
     */
    public function destroy($id)
    {
        $registro = Registro::findOrFail($id);
        $registro->delete();

        return redirect()->route('registros.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
