<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Lista de rutas excluidas de la verificación CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/docente/create', // Excluye esta ruta de CSRF
    ];
}
