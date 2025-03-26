<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios; // Asegúrate de importar el modelo Usuarios

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_rol'; // Clave primaria personalizada

    protected $fillable = [
        'nombre'
    ];

    // Relación: Un rol tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuarios::class, 'id_rol', 'id_rol');
    }
}

