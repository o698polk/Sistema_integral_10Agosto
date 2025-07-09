<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_curso',
        'codigo_curso',
        'descripcion',
        'capacidad_maxima',
        'aula',
        'hora_inicio',
        'hora_fin',
        'dias_clase',
        'id_usuario'
    ];

    // Relación con el usuario (profesor) que creó el curso
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    // Relación con estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'id_curso', 'id');
    }

    // Relación con docentes a través de la tabla pivot
    public function docentes()
    {
        return $this->belongsToMany(Usuario::class, 'curso_docente', 'id_curso', 'id_usuario')
                    ->where('rol', 'docente');
    }

    // Relación con horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_curso', 'id');
    }

    // Relación con materias a través de horarios
    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'horarios', 'id_curso', 'id_materia');
    }

    // Relación con asistencias
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_curso');
    }
} 