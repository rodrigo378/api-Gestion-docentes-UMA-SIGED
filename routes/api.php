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
    Route::get("validate-token", [AuthController::class, "validateToken"]);
});

// Login con google
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

// (protegidas con middleware auth:sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Ubicaciones 
    Route::prefix("ubi")->controller(UbicacionController::class)->group(function () {
        Route::get("/departamento", "getDepartamentos");
        Route::get("/provincia/{departamento_id}", "getProvincias");
        Route::get("/distrito/{provincia_id}", "getDistritos");
    });

    //Docentes 
    Route::prefix('docente')->controller(DocenteController::class)->group(function () {
        Route::post("/create", "createDocente");
        Route::get("/{id}", "getDocente");
        Route::get("/", "getDocentes");
        Route::delete("/{id}", "deleteDocente");
    });
});
