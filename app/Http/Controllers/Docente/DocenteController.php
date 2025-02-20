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
use Illuminate\Support\Facades\Log;
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
            "nombre_emergencia" => "required|string",
            "relacion_emergencia" => "required|string",
            "telefono_emergencia" => "required|string|size:9",
            "telefono_emergencia2" => "required|string|size:9",

            // Domicilio del Docente =>  experiencia no universitaria
            "departamento_id" => "required|integer",
            "provincia_id" => "required|integer",
            "distrito_id" => "required|integer",
            "direccion" => "required|string",
            "referencia" => "required|string",
            "mz" => "required|string",
            "lote" => "required|string",

            // Formación Académica
            'formacionAcademica' => 'nullable|array',
            'formacionAcademica.*.grado_academico' => 'required|string',
            'formacionAcademica.*.universidad' => 'required|string',
            'formacionAcademica.*.especialidad' => 'required|string',
            'formacionAcademica.*.pais' => 'required|string',
            'formacionAcademica.*.revalidacion' => 'required|string',

            // Títulos Profesionales (Licenciatura / Título)
            'titulosProfesionales' => 'nullable|array',
            'titulosProfesionales.*.titulo' => 'required|string',
            'titulosProfesionales.*.universidad' => 'required|string',
            'titulosProfesionales.*.especialidad' => 'required|string',

            // Formación Complementaria
            'formacionComplementaria' => 'nullable|array',
            'formacionComplementaria.*.denominacion' => 'nullable|string',
            'formacionComplementaria.*.especialidad' => 'nullable|string',
            'formacionComplementaria.*.institucion' => 'nullable|string',

            // Experiencia Docente Universitaria
            'experienciaUniversitaria' => 'nullable|array',
            'experienciaUniversitaria.*.nombre_universidad' => 'nullable|string',
            'experienciaUniversitaria.*.curso_dictado' => 'nullable|string',
            'experienciaUniversitaria.*.semestre' => 'nullable|string',
            'experienciaUniversitaria.*.pais' => 'nullable|string',

            // Experiencia Docente No Universitaria
            'experienciaNoUnivercitaria' => 'nullable|array',
            'experienciaNoUnivercitaria.*.nombre_universidad' => 'nullable|string',
            'experienciaNoUnivercitaria.*.curso_dictado' => 'nullable|string',
            'experienciaNoUnivercitaria.*.semestre' => 'nullable|string',
            'experienciaNoUnivercitaria.*.pais' => 'nullable|string',

            // Artículos Científicos
            'articuloCientifico' => 'nullable|array',
            'articuloCientifico.*.nombre_articulo' => 'nullable|string',
            'articuloCientifico.*.nombre_revista' => 'nullable|string',
            'articuloCientifico.*.indizado' => 'nullable|string',
            'articuloCientifico.*.año' => 'nullable|string',
            'articuloCientifico.*.enlace' => 'nullable|string',

            // Libros
            'libros' => 'nullable|array',
            'libros.*.libro_titulo' => 'nullable|string',
            'libros.*.nombre_editorial' => 'nullable|string',
            'libros.*.año' => 'nullable|string',

            // Proyectos de Investigación (Desarrollados o en Desarrollo)
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

            // Jurado De Tesis / Trabajos de Investigación
            'juradoTesis' => 'nullable|array',
            'juradoTesis.*.titulo_tesis' => 'nullable|string',
            'juradoTesis.*.universidad' => 'nullable|string',
            'juradoTesis.*.nivel_tesis' => 'nullable|string',
            'juradoTesis.*.año' => 'nullable|string',

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
            $data = [
                "message" => "error en el body",
                "errors" => $validator->errors(),
                "status" => 400
            ];
            return response()->json($data, 400);
        }

        $docente = [
            "nombres" => $request->nombres,
            "apellido_paterno" => $request->apellido_paterno,
            "apellido_materno" => $request->apellido_materno,
            "tipo_identificacion" => $request->tipo_identificacion,
            "numero_identificacion" => $request->numero_identificacion,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "email" => $request->email,
            "celular" => $request->celular,
            "telefono_fijo" => $request->telefono_fijo,
        ];

        $newDocente = Docente::create($docente);

        $contactosEmergencia = [
            "nombre" => $request->nombre_emergencia,
            "relacion" => $request->relacion_emergencia,
            "telefono_1" => $request->telefono_emergencia,
            "telefono_2" => $request->telefono_emergencia2,
            "docente_id" => $newDocente->id
        ];

        $domicilio = [
            "departamento_id" => (int) $request->departamento_id,
            "provincia_id" => (int) $request->provincia_id,
            "distrito_id" => (int) $request->distrito_id,
            "direccion" => $request->direccion,
            "referencia" => $request->referencia,
            "mz" => $request->mz,
            "lote" => $request->lote,
            "docente_id" => $newDocente->id
        ];

        ContactoEmergencia::create($contactosEmergencia);
        Domicilio::create($domicilio);

        if (!empty($request->formacionAcademica)) {
            foreach ($request->formacionAcademica as $formacionAcademica) {
                $data = [
                    "grado_academico" => $formacionAcademica["grado_academico"],
                    "universidad" => $formacionAcademica["universidad"],
                    "especialidad" => $formacionAcademica["especialidad"],
                    "pais" => $formacionAcademica["pais"],
                    "resolucion_sunedu" => $formacionAcademica["revalidacion"],
                    "docente_id" => $newDocente->id
                ];
                FormacionAcademica::create($data);
            }
        }

        if (!empty($request->titulosProfesionales)) {
            foreach ($request->titulosProfesionales as $titulosProfesional) {
                $data = [
                    "titulo" => $titulosProfesional["titulo"],
                    "universidad" => $titulosProfesional["universidad"],
                    "especialidad" => $titulosProfesional["especialidad"],
                    "docente_id" => $newDocente->id
                ];
                TituloProfesional::create($data);
            }
        }

        if (!empty($request->formacionComplementaria)) {
            foreach ($request->formacionComplementaria as $formacionComplementaria) {
                $data = [
                    "denominacion" => $formacionComplementaria["denominacion"],
                    "especialidad" => $formacionComplementaria["especialidad"],
                    "institucion" => $formacionComplementaria["institucion"],
                    "docente_id" => $newDocente->id
                ];
                FormacionComplementaria::create($data);
            }
        }


        if (!empty($request->experienciaUniversitaria)) {
            foreach ($request->experienciaUniversitaria as $experienciaUniversitaria) {
                $data = [
                    "institucion" => $experienciaUniversitaria["nombre_universidad"],
                    "curso_dictado" => $experienciaUniversitaria["curso_dictado"],
                    "semestre" => $experienciaUniversitaria["semestre"],
                    "pais" => $experienciaUniversitaria["pais"],
                    "tipo_experiencia" => 0,
                    "docente_id" => $newDocente->id
                ];
                ExperienciaDocente::create($data);
            }
        }

        if (!empty($request->experienciaNoUnivercitaria)) {
            foreach ($request->experienciaNoUnivercitaria as $experienciaNoUnivercitaria) {
                $data = [
                    "institucion" => $experienciaNoUnivercitaria["nombre_universidad"],
                    "curso_dictado" => $experienciaNoUnivercitaria["curso_dictado"],
                    "semestre" => $experienciaNoUnivercitaria["semestre"],
                    "pais" => $experienciaNoUnivercitaria["pais"],
                    "tipo_experiencia" => 1,
                    "docente_id" => $newDocente->id
                ];
                ExperienciaDocente::create($data);
            }
        }

        if (!empty($request->articuloCientifico)) {
            foreach ($request->articuloCientifico as $articuloCientifico) {
                $data = [
                    "titulo_articulo" => $articuloCientifico["nombre_articulo"],
                    "nombre_revista" => $articuloCientifico["nombre_revista"],
                    "indizado" => $articuloCientifico["indizado"],
                    "año" => $articuloCientifico["año"],
                    "enlace" => $articuloCientifico["enlace"],
                    "docente_id" => $newDocente->id
                ];
                ArticuloCientifico::create($data);
            }
        }

        if (!empty($request->libros)) {
            foreach ($request->libros as $libro) {
                $data = [
                    "titulo" => $libro["libro_titulo"],
                    "nombre_editorial" => $libro["nombre_editorial"],
                    "año" => $libro["año"],
                    "docente_id" => $newDocente->id
                ];
                Libro::create($data);
            }
        }

        if (!empty($request->proyectoInvestigacion)) {
            foreach ($request->proyectoInvestigacion as $proyectoInvestigacion) {
                $data = [
                    "nombre" => $proyectoInvestigacion["proyecto"],
                    "entidad_financiadora" => $proyectoInvestigacion["entidad_financiera"],
                    "año" => $proyectoInvestigacion["año_adjudicacion"],
                    "docente_id" => $newDocente->id
                ];
                ProyectoInvestigacion::create($data);
            }
        }

        if (!empty($request->asesoriaJurado)) {
            foreach ($request->asesoriaJurado as $asesoriaJurado) {
                $data = [
                    "titulo_tesis" => $asesoriaJurado["titulo_tesis"],
                    "universidad" => $asesoriaJurado["universidad"],
                    "nivel" => $asesoriaJurado["nivel_tesis"],
                    "año" => $asesoriaJurado["año"],
                    "tipo" => 0,
                    "docente_id" => $newDocente->id
                ];
                AsesoriaJurado::create($data);
            }
        }

        if (!empty($request->juradoTesis)) {
            foreach ($request->juradoTesis as $juradoTesis) {
                $data = [
                    "titulo_tesis" => $juradoTesis["titulo_tesis"],
                    "universidad" => $juradoTesis["universidad"],
                    "nivel" => $juradoTesis["nivel_tesis"],
                    "año" => $juradoTesis["año"],
                    "tipo" => 1,
                    "docente_id" => $newDocente->id
                ];
                AsesoriaJurado::create($data);
            }
        }

        if (!empty($request->otros)) {
            foreach ($request->otros as $otro) {
                $data = [
                    "idioma" => $otro["idioma"],
                    "nivel_idioma" => $otro["nivel_idioma"],
                    "office" => $otro["office"],
                    "nivel_office" => $otro["nivel_office"],
                    "elearning" => $otro["learning"],
                    "nivel_elearning" => $otro["nivel_learning"],
                    "docente_id" => $newDocente->id
                ];
                Otro::create($data);
            }
        }


        return response()->json(["docente" => $newDocente], 201);
    }
}
