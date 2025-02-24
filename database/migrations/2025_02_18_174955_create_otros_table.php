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
        Schema::create('otros', function (Blueprint $table) {
            $table->id();

            $table->string("idioma")->nullable();
            $table->string("nivel_idioma")->comment("Básico, Intermedio, Avanzado")->nullable();
            $table->string("office")->nullable();
            $table->string("nivel_office")->comment("Básico, Intermedio, Avanzado")->nullable();
            $table->string("learning")->nullable();
            $table->string("nivel_learning")->comment("Básico, Intermedio, Avanzado")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->onDelete('cascade');;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otros');
    }
};
