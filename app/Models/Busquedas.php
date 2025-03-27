<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioBusqueda extends Model
{
    use HasFactory;

    protected $table = 'usuario_busquedas';
    protected $fillable = [
        'usuario_id',
        'termino_busqueda',
        'fecha_busqueda',
    ];

    public $timestamps = false;

    // Relación con el usuario (ajustar si es necesario)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
