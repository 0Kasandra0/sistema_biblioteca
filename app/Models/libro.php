<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'disponible', // true/false para saber si está disponible
    ];

    // Relación con préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}