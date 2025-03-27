<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_busqueda extends Model
{
    use HasFactory;

    protected $table = 'usuario_busquedas'; // Nombre de la tabla en la BD

    protected $fillable = [
        'usuario_id', // ID del usuario que hizo la búsqueda
        'termino_busqueda',
        'fecha_busqueda',
    ];

    public $timestamps = false;

    // Relación: Una búsqueda pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
