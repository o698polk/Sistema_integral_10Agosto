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
        Schema::table('cursos', function (Blueprint $table) {
            // Eliminar campos innecesarios
            $table->dropColumn([
                'descripcion',
                'capacidad',
                'estado',
                'fecha_inicio',
                'fecha_fin',
                'created_at',
                'updated_at'
            ]);
            
            // Renombrar campos existentes si es necesario
            $table->renameColumn('nombre', 'nombre_curso');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cursos', function (Blueprint $table) {
            // Restaurar campos eliminados
            $table->text('descripcion')->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('estado', 20)->default('activo');
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->timestamps();
            
            // Restaurar nombre original
            $table->renameColumn('nombre_curso', 'nombre');
        });
    }
};
