<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_materia';
    protected $table = 'materias';

    protected $fillable = [
        'nombre_materia',
        'detalle_materia'
    ];

    // Relación con horarios
    public function horarios()
    {
        return $this->hasMany(Horario::class, 'id_materia', 'id_materia');
    }

    // Relación con docentes a través de horarios
    public function docentes()
    {
        return $this->belongsToMany(Usuario::class, 'horarios', 'id_materia', 'id_usuario')
                    ->where('rol', 'docente');
    }

    // Relación con cursos a través de horarios
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'horarios', 'id_materia', 'id_curso');
    }
}
