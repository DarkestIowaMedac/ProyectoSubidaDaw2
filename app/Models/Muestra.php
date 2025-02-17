<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    // Para que pueda usar su factoría:
    use HasFactory;

    // Campos rellenables
    protected $fillable = [
        'codigo', // Autorrellenable
        'fecha', // Rellenable
    ];

    /**
     * Cada muestra pertenece a una sede
     */
    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    /**
     * Cada muestra pertenece a un user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Cada muestra pertenece a una naturaleza
     */
    public function naturaleza()
    {
        return $this->belongsTo(Naturaleza::class);
    }

    /**
     * Cada muestra pertenece a un formato
     */
    public function formato()
    {
        return $this->belongsTo(Formato::class);
    }

    /**
     * Una muestra tiene muchas imágenes
     */
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    /**
     * Una muestra tiene muchas interpretaciones
     */
    public function interpretaciones()
    {
        return $this->hasMany(Imagen::class);
    }
}


