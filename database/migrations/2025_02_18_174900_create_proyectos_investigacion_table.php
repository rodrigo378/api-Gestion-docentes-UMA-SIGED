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
        Schema::create('proyectos_investigacion', function (Blueprint $table) {
            $table->id();

            $table->string("nombre")->nullable();
            $table->string("entidad_financiadora")->nullable();
            $table->string("año")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_investigacion');
    }
};
