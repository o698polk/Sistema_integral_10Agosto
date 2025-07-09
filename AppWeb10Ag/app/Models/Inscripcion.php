<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    // Especificar el nombre correcto de la tabla
    protected $table = 'inscripciones';

    protected $fillable = [
        'id_estudiante',
        'id_curso',
        'fecha_inscripcion',
        'estado',
        'observaciones',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
} 