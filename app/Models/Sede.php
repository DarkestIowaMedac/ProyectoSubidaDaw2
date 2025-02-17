<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Muestra;

class Sede extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    /**
     * Restringe los campos a los que el usuario podrá escribir datos.
     *
     * @var list<string>
     */
    protected $fillable = [
        'codigo',
        'nombre',
    ];

    /**
     * Una sede tiene muchos usuarios
     */
    public function users()
    {
        return $this->hasMany(User::class, 'idSede');
    }

    /**
     * Una sede tiene muchas muestras
     */
    public function muestras()
    {
        return $this->hasMany(Muestra::class, 'idSede');
    }
}
