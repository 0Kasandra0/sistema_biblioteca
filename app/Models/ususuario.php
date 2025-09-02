<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ususuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    // Relación con préstamos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
