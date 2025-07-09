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
        Schema::create('curso_docente', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_curso'); // Curso - coincide con cursos.id
            $table->unsignedInteger('id_usuario'); // Docente - coincide con usuarios.id
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_curso')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');

            // Índice único para evitar duplicados
            $table->unique(['id_curso', 'id_usuario']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curso_docente');
    }
};
