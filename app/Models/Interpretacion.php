<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpretacion extends Model
{
    // Para que pueda usar su factoría:
    use HasFactory;

    /**
     * Defino el nombre de la migración para evitar problemas
     * con el plural en castellano.
     */
    protected $table = 'interpretaciones';

    // Campos rellenables
    protected $fillable = [
        'texto', // Rellenable
    ];

    /**
     * Cada interpretación pertenece a una muestra
     */
    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
