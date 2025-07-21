<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::orderBy('nombre_materia')->paginate(10);
        return view('materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:100|unique:materias,nombre_materia',
            'detalle_materia' => 'nullable|string'
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')
                        ->with('success', 'Materia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        $materia->load(['horarios.docente', 'horarios.curso']);
        return view('materias.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:100|unique:materias,nombre_materia,' . $materia->id_materia . ',id_materia',
            'detalle_materia' => 'nullable|string'
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')
                        ->with('success', 'Materia actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        // Verificar si la materia tiene horarios asignados
        if ($materia->horarios()->count() > 0) {
            return redirect()->route('materias.index')
                            ->with('error', 'No se puede eliminar la materia porque tiene horarios asignados.');
        }

        $materia->delete();

        return redirect()->route('materias.index')
                        ->with('success', 'Materia eliminada exitosamente.');
    }

    /**
     * Buscar materias
     */
    public function buscar(Request $request)
    {
        $query = Materia::query();

        if ($request->filled('filtro_nombre')) {
            $query->where('nombre_materia', 'like', '%' . $request->filtro_nombre . '%');
        }

        $materias = $query->orderBy('nombre_materia')->paginate(10);

        return view('materias.index', compact('materias'));
    }
}
