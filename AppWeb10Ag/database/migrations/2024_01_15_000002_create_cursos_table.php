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
            $table->increments('id');
            $table->string('nombre_curso');
            $table->string('codigo_curso')->unique();
            $table->text('descripcion')->nullable();
            $table->integer('capacidad_maxima');
            $table->string('aula');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('dias_clase'); // L,M,M,J,V,S
            $table->integer('id_usuario')->unsigned(); // Profesor
            $table->foreign('id_usuario')->references('id')->on('usuarios');
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