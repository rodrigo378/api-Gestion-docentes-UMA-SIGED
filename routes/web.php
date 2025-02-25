<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Ubicacion\UbicacionController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
  return response()->json(['message' => 'No autenticado'], 401);
})->name('login');
