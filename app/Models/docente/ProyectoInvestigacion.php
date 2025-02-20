<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class ProyectoInvestigacion extends Model
{
    protected $table = "proyectos_investigacion";

    protected $fillable = [
        "nombre",
        "entidad_financiadora",
        "año",
        "docente_id",
    ];
}
