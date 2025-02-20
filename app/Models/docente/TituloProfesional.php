<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class TituloProfesional extends Model
{
    protected $table = "titulos_profesionales";

    protected $fillable = [
        "titulo",
        "universidad",
        "especialidad",
        "docente_id",
    ];
}
