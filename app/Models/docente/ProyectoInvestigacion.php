<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class ProyectoInvestigacion extends Model
{
    protected $table = "proyectos_investigacion";

    protected $fillable = [
        "proyecto",
        "entidad_financiera",
        "año_adjudicacion",
        "docente_id",
    ];
}
