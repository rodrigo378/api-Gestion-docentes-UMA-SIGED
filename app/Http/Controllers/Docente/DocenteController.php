<?php

namespace App\Http\Controllers\Docente;

use App\Http\Controllers\Controller;
use App\Models\docente\ArticuloCientifico;
use App\Models\docente\AsesoriaJurado;
use App\Models\docente\ContactoEmergencia;
use App\Models\docente\Docente;
use App\Models\docente\Domicilio;
use App\Models\docente\ExperienciaDocente;
use App\Models\docente\FormacionAcademica;
use App\Models\docente\FormacionComplementaria;
use App\Models\docente\Libro;
use App\Models\docente\Otro;
use App\Models\docente\ProyectoInvestigacion;
use App\Models\docente\TituloProfesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocenteController extends Controller
{
    public function createDocente(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // Información Personal Docente
            "nombres" => "required|string",
            "apellido_paterno" => "required|string",
            "apellido_materno" => "required|string",
            "tipo_identificacion" => "required|string",
            "numero_identificacion" => "required|string",
            "fecha_nacimiento" => "required|date",
            "email" => "required|string|email",
            "celular" => "required|string|size:9",
            "telefono_fijo" => "required|string|size:7",

            // Contacto de Emergencia
            "contactoEmergencia.nombre" => "required|string",
            "contactoEmergencia.relacion" => "required|string",
            "contactoEmergencia.telefono_1" => "required|string|size:9",
            "contactoEmergencia.telefono_2" => "nullable|string|size:9",

            // Domicilio del Docente
            "domicilio.departamento_id" => "required|integer",
            "domicilio.provincia_id" => "required|integer",
            "domicilio.distrito_id" => "required|integer",
            "domicilio.direccion" => "required|string",
            "domicilio.referencia" => "required|string",
            "domicilio.mz" => "required|string",
            "domicilio.lote" => "required|string",

            // Formación Académica
            'formacionAcademica' => 'nullable|array',
            'formacionAcademica.*.grado_academico' => 'required|string',
            'formacionAcademica.*.universidad' => 'required|string',
            'formacionAcademica.*.especialidad' => 'required|string',
            'formacionAcademica.*.pais' => 'required|string',
            'formacionAcademica.*.resolucion_sunedu' => 'required|string',

            // Títulos Profesionales
            'titulosProfesionales' => 'nullable|array',
            'titulosProfesionales.*.titulo' => 'required|string',
            'titulosProfesionales.*.universidad' => 'required|string',
            'titulosProfesionales.*.especialidad' => 'required|string',

            // Formación Complementaria
            'formacionComplementaria' => 'nullable|array',
            'formacionComplementaria.*.denominacion' => 'nullable|string',
            'formacionComplementaria.*.especialidad' => 'nullable|string',
            'formacionComplementaria.*.institucion' => 'nullable|string',

            // Experiencia Docente
            'experienciaDocente' => 'nullable|array',
            'experienciaDocente.*.institucion' => 'required|string',
            'experienciaDocente.*.curso_dictado' => 'required|string',
            'experienciaDocente.*.semestre' => 'required|string',
            'experienciaDocente.*.pais' => 'required|string',
            'experienciaDocente.*.tipo_experiencia' => 'required|integer',

            // Artículos Científicos
            'articuloCientifico' => 'nullable|array',
            'articuloCientifico.*.titulo_articulo' => 'nullable|string',
            'articuloCientifico.*.nombre_revista' => 'nullable|string',
            'articuloCientifico.*.indizado' => 'nullable|string',
            'articuloCientifico.*.año' => 'nullable|string',
            'articuloCientifico.*.enlace' => 'nullable|string',

            // Libros
            'libros' => 'nullable|array',
            'libros.*.titulo' => 'nullable|string',
            'libros.*.nombre_editorial' => 'nullable|string',
            'libros.*.año' => 'nullable|string',

            // Proyectos de Investigación
            'proyectoInvestigacion' => 'nullable|array',
            'proyectoInvestigacion.*.proyecto' => 'nullable|string',
            'proyectoInvestigacion.*.entidad_financiera' => 'nullable|string',
            'proyectoInvestigacion.*.año_adjudicacion' => 'nullable|string',

            // Asesorías y Jurados
            'asesoriaJurado' => 'nullable|array',
            'asesoriaJurado.*.titulo_tesis' => 'nullable|string',
            'asesoriaJurado.*.universidad' => 'nullable|string',
            'asesoriaJurado.*.nivel_tesis' => 'nullable|string',
            'asesoriaJurado.*.año' => 'nullable|string',
            'asesoriaJurado.*.tipo' => 'required|integer',

            // Otros Conocimientos
            'otros' => 'nullable|array',
            'otros.*.idioma' => 'nullable|string',
            'otros.*.nivel_idioma' => 'nullable|string',
            'otros.*.office' => 'nullable|string',
            'otros.*.nivel_office' => 'nullable|string',
            'otros.*.learning' => 'nullable|string',
            'otros.*.nivel_learning' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => "error en el body",
                "errors" => $validator->errors(),
                "status" => 400
            ], 400);
        }

        $docenteData = $request->only([
            "nombres",
            "apellido_paterno",
            "apellido_materno",
            "tipo_identificacion",
            "numero_identificacion",
            "fecha_nacimiento",
            "email",
            "celular",
            "telefono_fijo"
        ]);

        $newDocente = Docente::create($docenteData);

        ContactoEmergencia::create([
            "nombre" => $request->contactoEmergencia["nombre"],
            "relacion" => $request->contactoEmergencia["relacion"],
            "telefono_1" => $request->contactoEmergencia["telefono_1"],
            "telefono_2" => $request->contactoEmergencia["telefono_2"],
            "docente_id" => $newDocente->id
        ]);

        Domicilio::create(array_merge($request->domicilio, ["docente_id" => $newDocente->id]));

        foreach ($request->formacionAcademica ?? [] as $data) {
            FormacionAcademica::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->titulosProfesionales ?? [] as $data) {
            TituloProfesional::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->formacionComplementaria ?? [] as $data) {
            FormacionComplementaria::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->experienciaDocente ?? [] as $data) {
            ExperienciaDocente::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->articuloCientifico ?? [] as $data) {
            ArticuloCientifico::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->libros ?? [] as $data) {
            Libro::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->proyectoInvestigacion ?? [] as $data) {
            ProyectoInvestigacion::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->asesoriaJurado ?? [] as $data) {
            AsesoriaJurado::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        foreach ($request->otros ?? [] as $data) {
            Otro::create(array_merge($data, ["docente_id" => $newDocente->id]));
        }

        return response()->json(["docente" => $newDocente], 201);
    }


    public function getDocente(Request $request)
    {
        $id = $request->id;

        $docente = Docente::with([
            'contactoEmergencia',
            'domicilio',
            'formacionAcademica',
            'titulosProfesionales',
            'formacionComplementaria',
            'experienciaDocente',
            'articulosCientificos',
            'libros',
            'proyectosInvestigacion',
            'asesoriasJurado',
            'juradosTesis',
            'otros'
        ])->where("id", $id)->first();

        if (!$docente) {
            return response()->json([
                "message" => "Docente no encontrado",
                "status" => 404
            ], 404);
        }

        return response()->json(["docente" => $docente], 200);
    }

    public function getDocentes()
    {
        $docentes = Docente::all();
        return response()->json($docentes, 200);
    }

    public function deleteDocente(Request $request)
    {
        $id = $request->id;

        $docente = Docente::find($id);

        if (!$docente) {
            return response()->json([
                "message" => "Docente no encontrado",
                "status" => 404
            ], 404);
        }

        $docente->delete();

        return response()->json([
            "message" => "Docente eliminado correctamente",
            "status" => 200
        ], 200);
    }
}
