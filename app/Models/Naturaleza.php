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

    /**
     * Una naturaleza tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class);
    }

    /**
     * Una naturaleza tiene muchas descripciones
     */
    public function descripciones()
    {
        return $this->hasMany(Descripcion::class);
    }

    /**
     * Una naturaleza tiene muchas calidades
     */
    public function calidades()
    {
        return $this->hasMany(Calidad::class);
    }
}
