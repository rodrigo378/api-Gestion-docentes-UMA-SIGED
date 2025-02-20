<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class ExperienciaDocente extends Model
{
    protected $table = "experiencia_docente";

    protected $fillable = [
        "institucion",
        "curso_dictado",
        "semestre",
        "pais",
        "tipo_experiencia",
        "docente_id",
    ];
}
