<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class Otro extends Model
{
    protected $table = "otros";

    protected $fillable = [
        "idioma",
        "nivel_idioma",
        "office",
        "nivel_office",
        "elearning",
        "nivel_elearning",
        "docente_id",
    ];
}
