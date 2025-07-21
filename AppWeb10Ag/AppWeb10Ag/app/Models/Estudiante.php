<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_estudiante',
        'nombres',
        'apellidos',
        'cedula',
        'fecha_nacimiento',
        'genero',
        'direccion',
        'telefono',
        'email',
        'nombre_padre',
        'telefono_padre',
        'nombre_madre',
        'telefono_madre',
        'foto',
        'id_usuario'
    ];

    // Relación con el usuario que creó el estudiante
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    // Relación con cursos a través de inscripciones
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'inscripciones', 'id_estudiante', 'id_curso');
    }

    // Relación con inscripciones
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'id_estudiante', 'id');
    }

    // Relación con asistencias
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'id_estudiante');
    }

    // Método para generar código de estudiante automáticamente
    public function generarCodigoEstudiante()
    {
        $year = date('Y');
        $count = self::whereYear('created_at', $year)->count() + 1;
        return 'EST-' . $year . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    // Boot method para generar código automáticamente
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($estudiante) {
            if (empty($estudiante->codigo_estudiante)) {
                $estudiante->codigo_estudiante = $estudiante->generarCodigoEstudiante();
            }
        });
    }
} 