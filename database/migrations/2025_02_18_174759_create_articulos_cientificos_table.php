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
        Schema::create('articulos_cientificos', function (Blueprint $table) {
            $table->id();

            $table->string("titulo_articulo")->nullable();
            $table->string("nombre_revista")->nullable();
            $table->string("indizado")->nullable();
            $table->string("año")->nullable();
            $table->string("enlace")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos_cientificos');
    }
};
