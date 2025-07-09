<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Materia;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with(['docente', 'materia', 'curso'])
                          ->orderBy('dia')
                          ->orderBy('hora_inicio')
                          ->paginate(15);
        
        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Usuario::where('roles', 'docente')->orderBy('nombre_apellido')->get();
        $materias = Materia::orderBy('nombre_materia')->get();
        $cursos = Curso::orderBy('nombre_curso')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        return view('horarios.create', compact('docentes', 'materias', 'cursos', 'dias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_materia' => 'required|exists:materias,id_materia',
            'id_curso' => 'required|exists:cursos,id',
            'dia' => 'required|string|max:20',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio'
        ]);

        // Verificar que el usuario sea docente
        $usuario = Usuario::find($request->id_usuario);
        if ($usuario->roles !== 'docente') {
            return back()->withErrors(['id_usuario' => 'El usuario seleccionado no es un docente.']);
        }

        // Verificar solapamiento de horarios
        if (!Horario::validarHorario(
            $request->id_usuario, 
            $request->id_curso, 
            $request->dia, 
            $request->hora_inicio, 
            $request->hora_fin
        )) {
            return back()->withErrors(['hora_inicio' => 'Existe un conflicto de horarios para este docente en el día y horario seleccionado.']);
        }

        Horario::create($request->all());

        return redirect()->route('horarios.index')
                        ->with('success', 'Horario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        $horario->load(['docente', 'materia', 'curso']);
        return view('horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $docentes = Usuario::where('roles', 'docente')->orderBy('nombre_apellido')->get();
        $materias = Materia::orderBy('nombre_materia')->get();
        $cursos = Curso::orderBy('nombre_curso')->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        return view('horarios.edit', compact('horario', 'docentes', 'materias', 'cursos', 'dias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_materia' => 'required|exists:materias,id_materia',
            'id_curso' => 'required|exists:cursos,id',
            'dia' => 'required|string|max:20',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio'
        ]);

        // Verificar que el usuario sea docente
        $usuario = Usuario::find($request->id_usuario);
        if ($usuario->roles !== 'docente') {
            return back()->withErrors(['id_usuario' => 'El usuario seleccionado no es un docente.']);
        }

        // Verificar solapamiento de horarios (excluyendo el horario actual)
        if (!Horario::validarHorario(
            $request->id_usuario, 
            $request->id_curso, 
            $request->dia, 
            $request->hora_inicio, 
            $request->hora_fin,
            $horario->id_horario
        )) {
            return back()->withErrors(['hora_inicio' => 'Existe un conflicto de horarios para este docente en el día y horario seleccionado.']);
        }

        $horario->update($request->all());

        return redirect()->route('horarios.index')
                        ->with('success', 'Horario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        $horario->delete();

        return redirect()->route('horarios.index')
                        ->with('success', 'Horario eliminado exitosamente.');
    }

    /**
     * Buscar horarios
     */
    public function buscar(Request $request)
    {
        $query = Horario::with(['docente', 'materia', 'curso']);

        if ($request->filled('filtro_docente')) {
            $query->whereHas('docente', function($q) use ($request) {
                $q->where('nombre_apellido', 'like', '%' . $request->filtro_docente . '%');
            });
        }

        if ($request->filled('filtro_materia')) {
            $query->whereHas('materia', function($q) use ($request) {
                $q->where('nombre_materia', 'like', '%' . $request->filtro_materia . '%');
            });
        }

        if ($request->filled('filtro_curso')) {
            $query->whereHas('curso', function($q) use ($request) {
                $q->where('nombre_curso', 'like', '%' . $request->filtro_curso . '%');
            });
        }

        if ($request->filled('filtro_dia')) {
            $query->where('dia', $request->filtro_dia);
        }

        $horarios = $query->orderBy('dia')->orderBy('hora_inicio')->paginate(15);

        return view('horarios.index', compact('horarios'));
    }

    /**
     * Consulta especial: Horarios por curso con docente y materia
     */
    public function horariosPorCurso()
    {
        $horarios = Horario::with(['docente', 'materia', 'curso'])
                          ->select('horarios.*')
                          ->join('cursos', 'horarios.id_curso', '=', 'cursos.id')
                          ->join('usuarios', 'horarios.id_usuario', '=', 'usuarios.id')
                          ->join('materias', 'horarios.id_materia', '=', 'materias.id_materia')
                          ->orderBy('cursos.nombre_curso')
                          ->orderBy('horarios.dia')
                          ->orderBy('horarios.hora_inicio')
                          ->get();

        return view('horarios.consulta', compact('horarios'));
    }
}
