<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_horario';
    protected $table = 'horarios';

    protected $fillable = [
        'id_usuario',
        'id_materia',
        'id_curso',
        'dia',
        'hora_inicio',
        'hora_fin'
    ];

    protected $casts = [
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i'
    ];

    // Relación con docente (usuario)
    public function docente()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    // Relación con materia
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia', 'id_materia');
    }

    // Relación con curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id');
    }

    // Validación para evitar solapamiento de horarios
    public static function validarHorario($id_usuario, $id_curso, $dia, $hora_inicio, $hora_fin, $exclude_id = null)
    {
        $query = self::where('id_usuario', $id_usuario)
                    ->where('dia', $dia)
                    ->where(function($q) use ($hora_inicio, $hora_fin) {
                        $q->whereBetween('hora_inicio', [$hora_inicio, $hora_fin])
                          ->orWhereBetween('hora_fin', [$hora_inicio, $hora_fin])
                          ->orWhere(function($q2) use ($hora_inicio, $hora_fin) {
                              $q2->where('hora_inicio', '<=', $hora_inicio)
                                 ->where('hora_fin', '>=', $hora_fin);
                          });
                    });

        if ($exclude_id) {
            $query->where('id_horario', '!=', $exclude_id);
        }

        return $query->count() === 0;
    }
}
