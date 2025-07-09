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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('id_horario');
            $table->unsignedInteger('id_usuario'); // Docente - coincide con usuarios.id
            $table->unsignedBigInteger('id_materia');
            $table->unsignedInteger('id_curso'); // Curso - coincide con cursos.id
            $table->string('dia', 20); // Lunes, Martes, etc.
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');

            // Índices para optimizar consultas
            $table->index(['id_usuario', 'dia', 'hora_inicio', 'hora_fin']);
            $table->index(['id_curso', 'dia', 'hora_inicio', 'hora_fin']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
