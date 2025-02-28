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
use Illuminate\Support\Facades\Auth;

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
            'formacionAcademica.*.grado_academico' => 'nullable|string',
            'formacionAcademica.*.universidad' => 'nullable|string',
            'formacionAcademica.*.especialidad' => 'nullable|string',
            'formacionAcademica.*.pais' => 'nullable|string',
            'formacionAcademica.*.resolucion_sunedu' => 'nullable|string',

            // Títulos Profesionales
            'titulosProfesionales' => 'nullable|array',
            'titulosProfesionales.*.titulo' => 'nullable|string',
            'titulosProfesionales.*.universidad' => 'nullable|string',
            'titulosProfesionales.*.especialidad' => 'nullable|string',

            // Formación Complementaria
            'formacionComplementaria' => 'nullable|array',
            'formacionComplementaria.*.denominacion' => 'nullable|string',
            'formacionComplementaria.*.especialidad' => 'nullable|string',
            'formacionComplementaria.*.institucion' => 'nullable|string',

            // Experiencia Docente
            'experienciaDocente' => 'nullable|array',
            'experienciaDocente.*.institucion' => 'nullable|string',
            'experienciaDocente.*.curso_dictado' => 'nullable|string',
            'experienciaDocente.*.semestre' => 'nullable|string',
            'experienciaDocente.*.pais' => 'nullable|string',
            'experienciaDocente.*.tipo_experiencia' => 'nullable|integer',

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
            'asesoriaJurado.*.nivel' => 'nullable|string',
            'asesoriaJurado.*.año' => 'nullable|string',
            'asesoriaJurado.*.tipo' => 'nullable|integer',

            // Otros Conocimientos
            'otros' => 'nullable|array',
            'otros.*.idioma' => 'nullable|string',
            'otros.*.nivel_idioma' => 'nullable|string',
            'otros.*.office' => 'nullable|string',
            'otros.*.nivel_office' => 'nullable|string',
            'otros.*.learning' => 'nullable|string',
            'otros.*.nivel_learning' => 'nullable|string',
        ]);

        $user = Auth::user();

        if ($user->docente) {
            return response()->json([
                "message" => "Este usuario ya tiene un docente creado",
                "status" => 400
            ], 400);
        }

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

        $docenteData["user_id"] = $user->id;

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

    public function getDocenteUser()
    {
        $user = Auth::user();

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

        ])->where("user_id", $user->id)->first();

        if (!$docente) {
            return response()->json([
                "success" => false,
                "message" => "Docente no encontrado",
                "status" => 401
            ], 404);
        }

        return response()->json([
            "docente" => $docente,
            "estado" => $docente->estado
        ], 200);
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
                "success" => false,
                "message" => "Docente no encontrado",
                "status" => 404
            ], 404);
        }

        return response()->json(["docente" => $docente], 200);
    }

    public function getDocentes()
    {
        $docentes = Docente::where('estado', 0) -> get();
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

    public function aprobarDocente(Request $request)
    {
    $id = $request->id;

    // Buscar el docente
    $docente = Docente::find($id);

    if (!$docente) {
        return response()->json([
            "message" => "Docente no encontrado",
            "status" => 404
        ], 404);
    }

    // Verificar si ya está aprobado
    if ($docente->estado == 1) {
        return response()->json([
            "message" => "El docente ya está aprobado",
            "status" => 400
        ], 400);
    }

    // Aprobar docente
    $docente->estado = 1;
    $docente->save();

    return response()->json([
        "message" => "Docente aprobado correctamente",
        "docente" => $docente,
        "status" => 200
    ], 200);
    }

    public function getDocentesAprobados()
    {
        $docentes = Docente::where('estado', 1) -> get();
        return response()->json($docentes, 200);
    }

}



// {
//     "nombres": "Juan",
//     "apellido_paterno": "palomino",
//     "apellido_materno": "González",
//     "tipo_identificacion": "DNI",
//     "numero_identificacion": "12345678",
//     "fecha_nacimiento": "1990-05-20",
//     "email": "juan.perez@example.com",
//     "celular": "987654321",
//     "telefono_fijo": "1234567",

//     "contactoEmergencia": {
//       "nombre": "Ana Pérez",
//       "relacion": "Hermana",
//       "telefono_1": "987654322",
//       "telefono_2": "987654323"
//     },

//     "domicilio": {
//       "departamento_id": 1,
//       "provincia_id": 1,
//       "distrito_id": 1,
//       "direccion": "Av. Ejemplo 123",
//       "referencia": "Cerca al parque",
//       "mz": "A",
//       "lote": "5"
//     },

//     "formacionAcademica": [
//       {
//         "grado_academico": "Bachiller",
//         "universidad": "Universidad Nacional",
//         "especialidad": "Ingeniería de Sistemas",
//         "pais": "Perú",
//         "resolucion_sunedu": "Sí"
//       }
//     ],

//     "titulosProfesionales": [
//       {
//         "titulo": "Ingeniero de Sistemas",
//         "universidad": "Universidad Nacional",
//         "especialidad": "Sistemas"
//       }
//     ],

//     "formacionComplementaria": [
//       {
//         "denominacion": "Diplomado en Gestión",
//         "especialidad": "Gestión de Proyectos",
//         "institucion": "Escuela de Negocios"
//       }
//     ],

//     "experienciaDocente": [
//       {
//         "institucion": "Universidad X",
//         "curso_dictado": "Programación Avanzada",
//         "semestre": "2023-1",
//         "pais": "Perú",
//         "tipo_experiencia": 1
//       },
//       {
//         "institucion": "Universidad Y",
//         "curso_dictado": "Programación Avanzada",
//         "semestre": "2023-1",
//         "pais": "Perú",
//         "tipo_experiencia": 2
//       }
//     ],

//     "articuloCientifico": [
//       {
//         "titulo_articulo": "Inteligencia Artificial en Educación",
//         "nombre_revista": "Revista Tech",
//         "indizado": "Scopus",
//         "año": "2022",
//         "enlace": "https://revistatech.com/ai-education"
//       }
//     ],

//     "libros": [
//       {
//         "titulo": "Fundamentos de Programación",
//         "nombre_editorial": "Editorial ABC",
//         "año": "2021"
//       }
//     ],

//     "proyectoInvestigacion": [
//       {
//         "proyecto": "Desarrollo de Software Educativo",
//         "entidad_financiera": "CONCYTEC",
//         "año_adjudicacion": "2020"
//       }
//     ],

//     "asesoriaJurado": [
//       {
//         "titulo_tesis": "E-learning en Universidades",
//         "universidad": "Universidad Z",
//         "nivel_tesis": "Maestría",
//         "año": "2023",
//         "tipo": 0
//       },
//       {
//           "titulo_tesis": "E-learning en Universidades",
//         "universidad": "Universidad Z",
//         "nivel_tesis": "Maestría",
//         "año": "2023",
//         "tipo": 1
//       }
//     ],

//     "otros": [
//       {
//         "idioma": "Inglés",
//         "nivel_idioma": "Avanzado",
//         "office": "Excel",
//         "nivel_office": "Intermedio",
//         "learning": "Moodle",
//         "nivel_learning": "Básico"
//       }
//     ]
// }
