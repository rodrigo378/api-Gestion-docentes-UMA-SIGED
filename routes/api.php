<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Ubicacion\UbicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);



// Ubicaciones
Route::get("/getDepartamento", [UbicacionController::class, "getDepartamentos"])->name("getDepartamentos");
Route::get("/getProvincia/{departamento_id}", [UbicacionController::class, "getProvincias"])->name("getProvincias");
Route::get("/getDistrito/{provincia_id}", [UbicacionController::class, "getDistritos"])->name("getDistritos");


//Docentes 
Route::post("/docente/create", [DocenteController::class, "createDocente"])->name("docente.createDocente");
