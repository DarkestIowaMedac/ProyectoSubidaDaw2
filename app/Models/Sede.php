<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Muestra;

class Sede extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * Campos rellenables.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
    ];

    /**
     * Una sede tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'idSede');
    }
}
