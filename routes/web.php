<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
  return response()->json(['message' => 'No autenticado'], 401);
})->name('login');
