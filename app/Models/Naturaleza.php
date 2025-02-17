<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Naturaleza extends Model
{
    /**
     * Campos rellenables.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo', // Autorrellenable
        'tipoEstudio', // Autorrellenable
    ];
}
