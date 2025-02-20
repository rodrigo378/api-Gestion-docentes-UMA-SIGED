<?php

namespace App\Http\Controllers\Ubicacion;

use App\Http\Controllers\Controller;
use App\Models\Ubicacion\Departamento;
use App\Models\Ubicacion\Distrito;
use App\Models\Ubicacion\Provincia;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function getDepartamentos()
    {
        $departamentos = Departamento::all();
        return response()->json(["departamentos" => $departamentos]);
    }

    public function getProvincias(Request $request)
    {
        $departamento_id = $request->route("departamento_id");
        $provincias = Provincia::where("departamento_id", $departamento_id)->get();
        return response()->json(["provincias" => $provincias]);
    }

    public function getDistritos(Request $request)
    {
        $provincia_id = $request->route("provincia_id");
        $distritos = Distrito::where("provincia_id", $provincia_id)->get();
        return response()->json(["distritos" => $distritos]);
    }
}
