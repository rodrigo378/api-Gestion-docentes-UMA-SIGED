<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = "libros";

    protected $fillable = [
        "titulo",
        "nombre_editorial",
        "año",
        "docente_id",
    ];
}
