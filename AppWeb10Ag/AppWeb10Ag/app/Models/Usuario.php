<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_apellido',
        'correo',
        'usuario',
        'roles',
        'clave',
        'imgprofile',
        'dni',
        'phones',
        'address',
        'account',
    ];

    // Relación con cursos como docente
    public function cursosComoDocente()
    {
        return $this->belongsToMany(Curso::class, 'curso_docente', 'id_usuario', 'id_curso')
                    ->where('roles', 'docente');
    }

    // Relación con horarios como docente
    public function horariosComoDocente()
    {
        return $this->hasMany(Horario::class, 'id_usuario', 'id')
                    ->where('roles', 'docente');
    }

    // Relación con materias a través de horarios
    public function materiasComoDocente()
    {
        return $this->belongsToMany(Materia::class, 'horarios', 'id_usuario', 'id_materia')
                    ->where('roles', 'docente');
    }

    // Relación con asistencias registradas por el usuario
    public function asistenciasRegistradas()
    {
        return $this->hasMany(Asistencia::class, 'id_usuario', 'id');
    }

    // Método para verificar si es docente
    public function esDocente()
    {
        return $this->roles === 'docente';
    }

    // Método para obtener horarios de un docente en un día específico
    public function horariosDelDia($dia)
    {
        return $this->horariosComoDocente()->where('dia', $dia)->orderBy('hora_inicio');
    }

    /*   protected static function boot()
    {
        parent::boot();

        // Evento "saving" para encriptar automáticamente la clave antes de guardar
        static::saving(function ($usuario) {
            // Verificar si la clave ha sido modificada
            if ($usuario->isDirty('clave')) {
                $usuario->clave = Hash::make($usuario->clave);
            }
        });
    }*/
}
