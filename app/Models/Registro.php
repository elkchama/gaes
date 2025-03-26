<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si no sigue la convención plural
    protected $table = 'registros';

    // Define la clave primaria de la tabla
    protected $primaryKey = 'id_registro';

    // Indica si la clave primaria es auto-incremental (true por defecto)
    public $incrementing = true;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'usuario_id',
        'ip_registro',
        'metodo_registro',
        'verificado',
    ];

    /**
     * Relación con el modelo Usuario.
     * Se establece una relación belongsTo ya que cada registro pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id', 'id_usuario');
    }
}
