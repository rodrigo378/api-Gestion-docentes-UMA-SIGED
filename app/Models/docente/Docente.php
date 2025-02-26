<?php

namespace App\Models\docente;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = "docentes";

    protected $fillable = [
        "nombres",
        "apellido_paterno",
        "apellido_materno",
        "tipo_identificacion",
        "numero_identificacion",
        "fecha_nacimiento",
        "email",
        "celular",
        "telefono_fijo",
        "estado",
        "user_id"
    ];

    // Relación con User (Uno a Uno)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // Relación con Contacto de Emergencia (Uno a Uno)
    public function contactoEmergencia()
    {
        return $this->hasOne(ContactoEmergencia::class, 'docente_id');
    }

    // Relación con Domicilio (Uno a Uno)
    public function domicilio()
    {
        return $this->hasOne(Domicilio::class, 'docente_id');
    }

    // Relación con Formación Académica (Uno a Muchos)
    public function formacionAcademica()
    {
        return $this->hasMany(FormacionAcademica::class, 'docente_id');
    }

    // Relación con Títulos Profesionales (Uno a Muchos)
    public function titulosProfesionales()
    {
        return $this->hasMany(TituloProfesional::class, 'docente_id');
    }

    // Relación con Formación Complementaria (Uno a Muchos)
    public function formacionComplementaria()
    {
        return $this->hasMany(FormacionComplementaria::class, 'docente_id');
    }

    // Relación con Experiencia Docente (Uno a Muchos)
    public function experienciaDocente()
    {
        return $this->hasMany(ExperienciaDocente::class, 'docente_id');
    }

    // Relación con Artículos Científicos (Uno a Muchos)
    public function articulosCientificos()
    {
        return $this->hasMany(ArticuloCientifico::class, 'docente_id');
    }

    // Relación con Libros (Uno a Muchos)
    public function libros()
    {
        return $this->hasMany(Libro::class, 'docente_id');
    }

    // Relación con Proyectos de Investigación (Uno a Muchos)
    public function proyectosInvestigacion()
    {
        return $this->hasMany(ProyectoInvestigacion::class, 'docente_id');
    }

    // Relación con Asesorías y Jurado (Uno a Muchos)
    public function asesoriasJurado()
    {
        return $this->hasMany(AsesoriaJurado::class, 'docente_id')->where('tipo', 0);
    }

    // Relación con Jurado de Tesis (Uno a Muchos)
    public function juradosTesis()
    {
        return $this->hasMany(AsesoriaJurado::class, 'docente_id')->where('tipo', 1);
    }

    // Relación con Otros Conocimientos (Uno a Muchos)
    public function otros()
    {
        return $this->hasMany(Otro::class, 'docente_id');
    }
}
