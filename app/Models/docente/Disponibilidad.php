<?php

namespace App\Models\Docente;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $table = "disponibilidad";

    protected $fillable = [
        "dia",
        "hora_inicio",
        "hora_fin",
        "modalidad",
        "docente_id"
    ];
}
