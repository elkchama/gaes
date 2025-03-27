<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    // Definimos la tabla y la llave primaria personalizada
    protected $table = 'registros';
    protected $primaryKey = 'id_registro';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'id_usuario',
        'nombre_completo',
        'nombre_usuario',
        'correo_electronico',
        'numero_telefono',
        'contraseña',
        'confirmar_contraseña',
        'genero'
    ];

    // Relación 1:1 con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}
