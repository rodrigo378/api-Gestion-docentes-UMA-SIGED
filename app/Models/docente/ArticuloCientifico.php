<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class ArticuloCientifico extends Model
{
    protected $table = "articulos_cientificos";

    protected $fillable = [
        "titulo_articulo",
        "nombre_revista",
        "indizado",
        "año",
        "enlace",
        "docente_id",
    ];
}
