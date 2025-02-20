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
        Schema::create('experiencia_docente', function (Blueprint $table) {
            $table->id();

            $table->string("institucion")->nullable();
            $table->string("curso_dictado")->nullable();
            $table->string("semestre")->nullable();
            $table->string("pais")->nullable();
            $table->tinyInteger("tipo_experiencia")->comment("0 => Universitario, 1 => no_universitario");

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_docente');
    }
};
