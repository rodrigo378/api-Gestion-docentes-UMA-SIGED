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
        Schema::create('asesoria_jurados', function (Blueprint $table) {
            $table->id();

            $table->string("titulo_tesis")->nullable();
            $table->string("universidad")->nullable();
            $table->string("nivel")->nullable();
            $table->string("año")->nullable();
            $table->tinyInteger("tipo")->comment("0 => Asesor, 1 => Jurado");

            $table->foreignId("docente_id")->nullable()->constrained("docentes")->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesoria_jurados');
    }
};
