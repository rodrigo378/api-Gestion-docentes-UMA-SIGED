<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class FormacionComplementaria extends Model
{
    protected $table = "formacion_complementaria";

    protected $fillable = [
        "denominacion",
        "especialidad",
        "institucion",
        "docente_id",
    ];
}
