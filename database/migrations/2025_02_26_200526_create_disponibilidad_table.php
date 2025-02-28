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
        Schema::create('disponibilidad', function (Blueprint $table) {
            $table->id();

            $table->foreignId("docente_id")->constrained("docentes")->onDelete("cascade");

            $table->enum("dia", ["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"]);
            $table->time("hora_inicio")->nullable();
            $table->time("hora_fin")->nullable();
            $table->enum("modalidad", ["presencial", "virtual"]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disponibilidad');
    }
};
