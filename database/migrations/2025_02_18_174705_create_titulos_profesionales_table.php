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
        Schema::create('titulos_profesionales', function (Blueprint $table) {
            $table->id();

            $table->string("titulo")->nullable();
            $table->string("universidad")->nullable();
            $table->string("especialidad")->nullable();

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titulos_profesionales');
    }
};
