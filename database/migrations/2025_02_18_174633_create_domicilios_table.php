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
        Schema::create('domicilios', function (Blueprint $table) {
            $table->id();

            $table->foreignId("departamento_id")->constrained("departamentos")->onDelete('cascade');
            $table->foreignId("provincia_id")->constrained("provincias")->onDelete('cascade');
            $table->foreignId("distrito_id")->constrained("distritos")->onDelete('cascade');

            $table->string("direccion")->nullable();
            $table->string("referencia")->nullable();
            $table->string("mz")->nullable();
            $table->string("lote")->nullable();

            $table->foreignId("docente_id")->constrained("docentes")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domicilios');
    }
};
