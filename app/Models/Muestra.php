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
        'nombre',
        'descripcion',
    ];
}
