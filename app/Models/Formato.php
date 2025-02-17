<?php

namespace App\Models;

use App\Models\Muestra;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    /**
     * Campos rellenables.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre', // Autorrellenable
    ];

    /**
     * Un formato tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class);
    }
}
