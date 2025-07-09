<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_estudiante',
        'id_curso',
        'fecha',
        'hora_entrada',
        'hora_salida',
        'estado',
        'justificacion',
        'id_usuario',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
} 