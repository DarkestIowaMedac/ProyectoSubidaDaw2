<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descripcion extends Model
{
    /**
     * Defino el nombre de la migración para evitar problemas
     * con el plural en castellano.
     */
    protected $table = 'descripciones';

    // Campos rellenables
    protected $fillable = [
        'codigo', // Autorrellenable
        'texto', // Autorrellenable
    ];
}
