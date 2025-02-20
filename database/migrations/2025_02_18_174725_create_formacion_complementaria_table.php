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
        Schema::create('formacion_complementaria', function (Blueprint $table) {
            $table->id();

            $table->string("denominacion")->nullable();
            $table->string("especialidad")->nullable();
            $table->string("institucion")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formacion_complmentaria');
    }
};
