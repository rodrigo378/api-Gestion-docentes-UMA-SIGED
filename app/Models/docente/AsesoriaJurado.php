<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class AsesoriaJurado extends Model
{
    protected $table = "asesoria_jurados";

    protected $fillable = [
        "titulo_tesis",
        "universidad",
        "nivel",
        "año",
        "tipo",
        "docente_id",
    ];
}
