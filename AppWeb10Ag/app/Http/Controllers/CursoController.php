<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Session;

class CursoController extends Controller
{
    public function index()
    {
        try {
            if (session()->has('user')) {
                $datos = Curso::with('usuario')->latest()->paginate(10);
                return view('cursos.index', compact('datos'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar: ' . $e->getMessage());
        }
    }

    public function buscar(Request $request)
    {
        try {
            $query = Curso::with('usuario');

            if ($request->has('filtro_nombre')) {
                $filtro_nombre = $request->input('filtro_nombre');
                $query->where('nombre_curso', 'like', "%$filtro_nombre%");
            }

            if ($request->has('filtro_codigo')) {
                $filtro_codigo = $request->input('filtro_codigo');
                $query->where('codigo_curso', 'like', "%$filtro_codigo%");
            }

            $datos = $query->latest()->paginate(10);
            return view('cursos.index', compact('datos'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al buscar');
        }
    }

    public function create()
    {
        try {
            if (session()->has('user')) {
                return view('cursos.create');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar');
        }
    }

    public function store(Request $request)
    {
        try {
            if (session()->has('user')) {
                $curso = new Curso();
                $curso->nombre_curso = $request->input('nombre_curso');
                $curso->codigo_curso = $request->input('codigo_curso');
                $curso->descripcion = $request->input('descripcion');
                $curso->capacidad_maxima = $request->input('capacidad_maxima');
                $curso->aula = $request->input('aula');
                $curso->hora_inicio = $request->input('hora_inicio');
                $curso->hora_fin = $request->input('hora_fin');
                $curso->dias_clase = $request->input('dias_clase');
                $curso->id_usuario = session('user')->id;

                if ($curso->save()) {
                    return redirect()->back()->with('error', 'Curso creado con éxito');
                }

                return redirect()->back()->with('error', 'Error al crear curso');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al crear: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            if (session()->has('user')) {
                $dato = Curso::with('usuario')->findOrFail($id);
                return view('cursos.show', compact('dato'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar');
        }
    }

    public function edit($id)
    {
        try {
            if (session()->has('user')) {
                $dato = Curso::findOrFail($id);
                return view('cursos.edit', compact('dato'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if (session()->has('user')) {
                $curso = Curso::findOrFail($id);
                $curso->nombre_curso = $request->input('nombre_curso');
                $curso->codigo_curso = $request->input('codigo_curso');
                $curso->descripcion = $request->input('descripcion');
                $curso->capacidad_maxima = $request->input('capacidad_maxima');
                $curso->aula = $request->input('aula');
                $curso->hora_inicio = $request->input('hora_inicio');
                $curso->hora_fin = $request->input('hora_fin');
                $curso->dias_clase = $request->input('dias_clase');

                if ($curso->save()) {
                    return redirect()->back()->with('error', 'Curso actualizado con éxito');
                }

                return redirect()->back()->with('error', 'Error al actualizar curso');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            if (session()->has('user')) {
                $curso = Curso::findOrFail($id);

                if ($curso->delete()) {
                    return redirect()->back()->with('error', 'Curso eliminado con éxito');
                }

                return redirect()->back()->with('error', 'Error al eliminar curso');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }
} 