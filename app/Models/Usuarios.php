<?php

namespace App\Models;
use App\Models\Roles;
// Removed duplicate import
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Registros;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Clave primaria personalizada

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'contrasena',
        'telefono',
        'direccion',
        'id_rol',
    ];

    // Relación con la tabla roles
    public function rol()
{
    return $this->belongsTo(Roles::class, 'id_rol', 'id_rol'); // ✅ CORREGIDO
}

    // Relación con la tabla registros
    public function registro()
{
    return $this->hasOne(Registro::class, 'usuario_id', 'id_usuario');
}
}


