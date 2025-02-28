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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');

            $table->string('tipo_identificacion')->comment("DNI, RUC, Pasaporte o Carnet Extranjero");
            $table->string('numero_identificacion');

            $table->date('fecha_nacimiento');

            // $table->string('firma');

            $table->string('email');
            $table->string('celular', 9);
            $table->string('telefono_fijo', 7);

            $table->tinyInteger('estado')->default(0)->comment("0 = Pendiente, 1 = Aprobado, 3 = Rechazado");

            $table->foreignId("user_id")->unique()->constrained("users")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
