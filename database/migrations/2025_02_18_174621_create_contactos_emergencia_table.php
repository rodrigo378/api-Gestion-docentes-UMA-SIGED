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
        Schema::create('contactos_emergencia', function (Blueprint $table) {
            $table->id();

            $table->string("nombre");
            $table->string("relacion")->comment("Padre/Madre, Hermano/a, Amigo/a, Pareja u Otro");
            $table->char("telefono_1", 9);
            $table->char("telefono_2", 9);

            $table->foreignId("docente_id")->constrained("docentes")->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos_emergencia');
    }
};
