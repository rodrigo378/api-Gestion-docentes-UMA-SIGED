<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = "domicilios";

    protected $fillable = [
        "departamento_id",
        "provincia_id",
        "distrito_id",
        "direccion",
        "referencia",
        "mz",
        "lote",
        "docente_id",
    ];
}
