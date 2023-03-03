<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamos extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_user',
        'id_libro',
        'fecha_prestamo',
        'fecha_vencimiento',
        'fecha_devolucion'
    ];

    // Un prestamo pertenece a 1 usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Un prestamo es de 1 libro
    public function libro()
    {
        return $this->belongsTo(Libros::class, 'id_libro');
    }
}
