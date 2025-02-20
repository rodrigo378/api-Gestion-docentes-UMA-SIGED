<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formacion_academica', function (Blueprint $table) {
            $table->id();

            $table->string("grado_academico")->comment("Bachiller, Magister, Doctor")->nullable();;
            $table->string("universidad")->nullable();
            $table->string("especialidad")->nullable();
            $table->string("pais")->nullable();
            $table->string("resolucion_sunedu")->comment("Número de resolución en caso de revalidación")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacion_academica');
    }
};
