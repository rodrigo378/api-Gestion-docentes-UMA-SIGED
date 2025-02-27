<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\Docente\Disponibilidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DisponibilidadController extends Controller
{
    public function createDisponibilidad(Request $request)
    {
        $user = Auth::user();

        if (!$user->docente) {
            return response()->json([
                "message" => "El usuario no tiene un docente asignado",
                "status" => 400
            ], 400);
        }

        $validator = Validator::make($request->all(), [
            'disponibilidad' => 'required|array',
            'disponibilidad.*.dia' => 'required|string|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
            'disponibilidad.*.hora_inicio' => 'nullable|date_format:H:i:s',
            'disponibilidad.*.hora_fin' => 'nullable|date_format:H:i:s|after:disponibilidad.*.hora_inicio',
            'disponibilidad.*.modalidad' => 'required|string|in:presencial,virtual'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "error en el body",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }

        $disponibilidadExistente = Disponibilidad::where("docente_id", $user->docente->id)->exists();

        if ($disponibilidadExistente) {
            return response()->json([
                "message" => "Este usuario ya tiene disponibilidad creada",
                "status" => 400
            ], 400);
        }


        foreach ($request->disponibilidad ?? [] as $data) {
            Disponibilidad::create(array_merge($data, ["docente_id" => $user->docente->id]));
        };

        return response()->json([
            "message" => "Disponibilidad creada",
            "status" => 200
        ], 200);
    }

    public function getDisponibilidad(Request $request)
    {
        $docente_id = $request->docente_id;

        $disponibilidad = Disponibilidad::where("docente_id", $docente_id)->get();

        if ($disponibilidad->isEmpty()) {
            return response()->json([
                "message" => "No se encontró disponibilidad para este docente",
                "status" => 404
            ], 404);
        }

        return response()->json(
            $disponibilidad,
            200
        );
    }

    public function getDisponibilidadUser()
    {
        $user = Auth::user();

        $disponibilidad = Disponibilidad::where("docente_id", $user->docente->id)->get();

        if ($disponibilidad->isEmpty()) {
            return response()->json([
                "message" => "No se encontró disponibilidad para este docente",
                "status" => 404
            ], 404);
        }

        return response()->json(
            $disponibilidad,
            200
        );
    }
}
