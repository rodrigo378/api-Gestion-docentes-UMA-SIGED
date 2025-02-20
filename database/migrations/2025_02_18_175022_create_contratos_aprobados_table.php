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
        Schema::create('contratos_aprobados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id')->unique();
            $table->string('estado')->default('Aprobado');
            $table->timestamp('fecha_aprobacion')->useCurrent();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos_aprobados');
    }
};
