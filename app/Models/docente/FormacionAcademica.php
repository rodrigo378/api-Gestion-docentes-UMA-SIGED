<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class FormacionAcademica extends Model
{
    protected $table = "formacion_academica";

    protected $fillable = [
        "grado_academico",
        "universidad",
        "especialidad",
        "pais",
        "resolucion_sunedu",
        "docente_id",
    ];
}
