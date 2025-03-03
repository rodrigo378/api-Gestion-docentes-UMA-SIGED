<?php

use App\Imports\CursosImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/login', function () {
  return response()->json(['message' => 'No autenticado'], 401);
})->name('login');


Route::get('/importar-cursos', function () {
  $archivo = '../app/cursos.xlsx';

  if (!file_exists($archivo)) {
      return response()->json(['error' => '❌ El archivo no existe.']);
  }

  Excel::import(new CursosImport, $archivo);

  return response()->json(['message' => '✅ Importación completada.']);
});