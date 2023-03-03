<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Libros extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'titulo',
        'editorial',
        'autor',
        'foto',
        'descripcion'
    ];

    // Un libro tiene varios prestamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class)->whereNull('fecha_devolucion');
    }
}
