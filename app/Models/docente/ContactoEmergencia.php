<?php

namespace App\Models\docente;

use Illuminate\Database\Eloquent\Model;

class ContactoEmergencia extends Model
{
    protected $table = "contactos_emergencia";

    protected $fillable = [
        "nombre",
        "relacion",
        "telefono_1",
        "telefono_2",
        "docente_id",
    ];
}
