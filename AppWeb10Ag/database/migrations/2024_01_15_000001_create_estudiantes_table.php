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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_estudiante')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('cedula')->unique();
            $table->date('fecha_nacimiento');
            $table->string('genero');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('nombre_padre')->nullable();
            $table->string('telefono_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('telefono_madre')->nullable();
            $table->string('foto')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
}; 