<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'n_codper',
        'c_codmod',
        'c_codfac',
        'c_codesp',
        'c_codcur',
        'c_nomcur',
        'generales'
    ];
}