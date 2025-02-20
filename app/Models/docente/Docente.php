<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "docentes";

    protected $fillable = [
        "nombres",
        "apellido_paterno",
        "apellido_materno",
        "tipo_identificacion",
        "numero_identificacion",
        "fecha_nacimiento",
        "email",
        "celular",
        "telefono_fijo",
        "estado"
    ];
}
