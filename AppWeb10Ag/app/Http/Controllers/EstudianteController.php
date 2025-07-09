<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Usuario;
use App\Models\Curso;
use App\Models\Inscripcion;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class EstudianteController extends Controller
{
    public function index()
    {
        try {
            if (session()->has('user')) {
                $datos = Estudiante::with(['usuario', 'cursos'])->latest()->paginate(10);
                return view('estudiantes.index', compact('datos'));
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
            $query = Estudiante::with('usuario');

            if ($request->has('filtro_nombre')) {
                $filtro_nombre = $request->input('filtro_nombre');
                $query->where('nombres', 'like', "%$filtro_nombre%")
                      ->orWhere('apellidos', 'like', "%$filtro_nombre%");
            }

            if ($request->has('filtro_cedula')) {
                $filtro_cedula = $request->input('filtro_cedula');
                $query->where('cedula', 'like', "%$filtro_cedula%");
            }

            $datos = $query->latest()->paginate(10);
            return view('estudiantes.index', compact('datos'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al buscar');
        }
    }

    public function create()
    {
        try {
            if (session()->has('user')) {
                $cursos = Curso::all();
                return view('estudiantes.create', compact('cursos'));
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
                // Validar que la cédula sea única
                $cedula = $request->input('cedula');
                if (Estudiante::where('cedula', $cedula)->exists()) {
                    return redirect()->back()->with('error', 'La cédula ya está registrada en el sistema.');
                }

                // Validar que el email sea único
                $email = $request->input('email');
                if (Estudiante::where('email', $email)->exists()) {
                    return redirect()->back()->with('error', 'El email ya está registrado en el sistema.');
                }

                $estudiante = new Estudiante();
                $estudiante->nombres = $request->input('nombres');
                $estudiante->apellidos = $request->input('apellidos');
                $estudiante->cedula = $cedula;
                $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
                $estudiante->genero = $request->input('genero');
                $estudiante->direccion = $request->input('direccion');
                $estudiante->telefono = $request->input('telefono');
                $estudiante->email = $email;
                $estudiante->nombre_padre = $request->input('nombre_padre');
                $estudiante->telefono_padre = $request->input('telefono_padre');
                $estudiante->nombre_madre = $request->input('nombre_madre');
                $estudiante->telefono_madre = $request->input('telefono_madre');

                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                    $file = $request->file('foto');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/estudiantes'), $fileName);
                    $estudiante->foto = 'uploads/estudiantes/' . $fileName;
                }

                $estudiante->id_usuario = session('user')->id;

                if ($estudiante->save()) {
                    // Asignar el curso principal
                    if ($request->has('curso_id')) {
                        Inscripcion::create([
                            'id_estudiante' => $estudiante->id,
                            'id_curso' => $request->input('curso_id'),
                            'fecha_inscripcion' => now(),
                            'estado' => 'Activo',
                            'observaciones' => 'Inscripción principal'
                        ]);
                    }
                    return redirect()->back()->with('error', 'Estudiante creado con éxito');
                }

                return redirect()->back()->with('error', 'Error al crear estudiante');
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
                $dato = Estudiante::with(['usuario', 'cursos'])->findOrFail($id);
                return view('estudiantes.show', compact('dato'));
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
                $dato = Estudiante::with('cursos')->findOrFail($id);
                $cursos = Curso::all();
                return view('estudiantes.edit', compact('dato', 'cursos'));
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
                $estudiante = Estudiante::findOrFail($id);
                $estudiante->codigo_estudiante = $request->input('codigo_estudiante');
                $estudiante->nombres = $request->input('nombres');
                $estudiante->apellidos = $request->input('apellidos');
                $estudiante->cedula = $request->input('cedula');
                $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
                $estudiante->genero = $request->input('genero');
                $estudiante->direccion = $request->input('direccion');
                $estudiante->telefono = $request->input('telefono');
                $estudiante->email = $request->input('email');
                $estudiante->nombre_padre = $request->input('nombre_padre');
                $estudiante->telefono_padre = $request->input('telefono_padre');
                $estudiante->nombre_madre = $request->input('nombre_madre');
                $estudiante->telefono_madre = $request->input('telefono_madre');

                if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
                    // Eliminar foto anterior si existe
                    if ($estudiante->foto && File::exists(public_path($estudiante->foto))) {
                        File::delete(public_path($estudiante->foto));
                    }

                    $file = $request->file('foto');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/estudiantes'), $fileName);
                    $estudiante->foto = 'uploads/estudiantes/' . $fileName;
                }

                if ($estudiante->save()) {
                    return redirect()->back()->with('error', 'Estudiante actualizado con éxito');
                }

                return redirect()->back()->with('error', 'Error al actualizar estudiante');
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
                $estudiante = Estudiante::findOrFail($id);
                
                // Eliminar foto si existe
                if ($estudiante->foto && File::exists(public_path($estudiante->foto))) {
                    File::delete(public_path($estudiante->foto));
                }

                if ($estudiante->delete()) {
                    return redirect()->back()->with('error', 'Estudiante eliminado con éxito');
                }

                return redirect()->back()->with('error', 'Error al eliminar estudiante');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    // Método para asignar cursos a un estudiante
    public function asignarCursos(Request $request, $id)
    {
        try {
            if (session()->has('user')) {
                $estudiante = Estudiante::findOrFail($id);
                
                // Eliminar inscripciones existentes
                Inscripcion::where('id_estudiante', $id)->delete();
                
                // Crear nuevas inscripciones
                if ($request->has('cursos') && is_array($request->input('cursos'))) {
                    foreach ($request->input('cursos') as $cursoId) {
                        Inscripcion::create([
                            'id_estudiante' => $id,
                            'id_curso' => $cursoId,
                            'fecha_inscripcion' => now(),
                            'estado' => 'Activo',
                            'observaciones' => 'Asignación manual'
                        ]);
                    }
                }
                
                return redirect()->back()->with('error', 'Cursos asignados correctamente');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al asignar cursos: ' . $e->getMessage());
        }
    }

    // Método para ver cursos de un estudiante
    public function verCursos($id)
    {
        try {
            if (session()->has('user')) {
                $estudiante = Estudiante::with(['cursos', 'usuario'])->findOrFail($id);
                $cursosDisponibles = Curso::whereNotIn('id', $estudiante->cursos->pluck('id'))->get();
                return view('estudiantes.cursos', compact('estudiante', 'cursosDisponibles'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar cursos');
        }
    }
} 