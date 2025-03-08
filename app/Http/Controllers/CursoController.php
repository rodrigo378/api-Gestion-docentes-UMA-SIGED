<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function buscarCursos(Request $request)
    {
        $nombreCurso = $request->query('nombre');
        $categoria = $request->query('categoria'); // Opcional
    
        if (!$nombreCurso) {
            return response()->json(['error' => 'Debe proporcionar un nombre de curso'], 400);
        }
    
        $cursos = Curso::select('id', 'c_nomcur', 'GENERALES')
            ->where('c_nomcur', 'LIKE', "%{$nombreCurso}%")
            ->when($categoria, function ($query) use ($categoria) {
                return $query->where('GENERALES', $categoria);
            })
            ->distinct()
            ->get();
    
        if ($cursos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron cursos'], 404);
        }
    
        return response()->json($cursos, 200);
    }
    
}
