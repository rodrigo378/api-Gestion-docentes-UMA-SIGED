<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\Docente\DocenteController;
use App\Http\Controllers\Ubicacion\UbicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Login con google
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);



Route::middleware('auth:sanctum')->group(function () {});


// Ubicaciones (protegidas con middleware auth:sanctum)
Route::prefix("ubi")->controller(UbicacionController::class)->group(function () {
    Route::get("/departamento", "getDepartamentos");
    Route::get("/provincia/{departamento_id}", "getProvincias");
    Route::get("/distrito/{provincia_id}", "getDistritos");
});

//Docentes 
Route::prefix('docente')->controller(DocenteController::class)->group(function () {
    Route::post("/create", "createDocente")->name("docente.create");
    Route::get("/{id}", "getDocente")->name("docente.get");
    Route::get("/", "getDocentes")->name("docente.getAll");
    Route::delete("/{id}", "deleteDocente")->name("docente.delete");
});
