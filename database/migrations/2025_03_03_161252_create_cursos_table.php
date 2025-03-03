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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('n_codper', 20);
            $table->string('c_codmod', 10);
            $table->string('c_codfac', 10);
            $table->string('c_codesp', 10);
            $table->string('c_codcur', 10);
            $table->string('c_nomcur', 255);
            $table->string('generales')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
