<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    /**
     * Defino el nombre de la migración para evitar problemas
     * con el plural en castellano.
     */
    protected $table = 'imagenes';

    // Campos rellenables
    protected $fillable = [
        'ruta', // Rellenable
        'zoom', // Rellenable
        'muestra_id',
    ];

    /**
     * Cada imagen pertenece a una muestra
     */
    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
