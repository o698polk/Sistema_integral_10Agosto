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
        Schema::table('estudiantes', function (Blueprint $table) {
            // Eliminar campos innecesarios
            $table->dropColumn([
                'nombres',
                'apellidos',
                'email',
                'telefono',
                'direccion',
                'fecha_nacimiento',
                'genero',
                'estado',
                'foto',
                'created_at',
                'updated_at'
            ]);
            
            // Renombrar campos existentes
            $table->renameColumn('nombre_completo', 'nombre_estudiante');
            $table->renameColumn('cedula', 'cedula_estudiante');
            $table->renameColumn('curso_id', 'id_curso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estudiantes', function (Blueprint $table) {
            // Restaurar campos eliminados
            $table->string('nombres', 100)->nullable();
            $table->string('apellidos', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->text('direccion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 10)->nullable();
            $table->string('estado', 20)->default('activo');
            $table->string('foto', 255)->nullable();
            $table->timestamps();
            
            // Restaurar nombres originales
            $table->renameColumn('nombre_estudiante', 'nombre_completo');
            $table->renameColumn('cedula_estudiante', 'cedula');
            $table->renameColumn('id_curso', 'curso_id');
        });
    }
};
