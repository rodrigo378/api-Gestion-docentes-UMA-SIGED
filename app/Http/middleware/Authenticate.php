<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        throw new \Illuminate\Auth\AuthenticationException(
            'No autenticado',
            $guards,
            $this->jsonResponse()
        );
    }

    protected function jsonResponse()
    {
        return response()->json(['message' => 'No autenticado'], 401);
    }
}
