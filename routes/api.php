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
Route::get("/departamento", [UbicacionController::class, "getDepartamentos"])->name("getDepartamentos");
Route::get("/provincia/{departamento_id}", [UbicacionController::class, "getProvincias"])->name("getProvincias");
Route::get("/distrito/{provincia_id}", [UbicacionController::class, "getDistritos"])->name("getDistritos");


//Docentes 
Route::prefix('docente')->controller(DocenteController::class)->group(function () {
    Route::post("/create", "createDocente")->name("docente.create");
    Route::get("/{id}", "getDocente")->name("docente.get");
    Route::get("/", "getDocentes")->name("docente.getAll");
    Route::delete("/{id}", "deleteDocente")->name("docente.delete");
});
