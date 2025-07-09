<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Mail\EviarCorreo;
use Illuminate\Support\Facades\Mail;

class AsistenciaController extends Controller
{
    public function index()
    {
        try {
            if (session()->has('user')) {
                $datos = Asistencia::with(['estudiante', 'curso', 'usuario'])->latest()->paginate(10);
                return view('asistencias.index', compact('datos'));
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
            $query = Asistencia::with(['estudiante', 'curso', 'usuario']);

            if ($request->has('filtro_estudiante')) {
                $filtro_estudiante = $request->input('filtro_estudiante');
                $query->whereHas('estudiante', function ($q) use ($filtro_estudiante) {
                    $q->where('nombres', 'like', "%$filtro_estudiante%")
                      ->orWhere('apellidos', 'like', "%$filtro_estudiante%");
                });
            }

            if ($request->has('filtro_curso')) {
                $filtro_curso = $request->input('filtro_curso');
                $query->whereHas('curso', function ($q) use ($filtro_curso) {
                    $q->where('nombre_curso', 'like', "%$filtro_curso%");
                });
            }

            if ($request->has('filtro_fecha')) {
                $filtro_fecha = $request->input('filtro_fecha');
                $query->where('fecha', $filtro_fecha);
            }

            $datos = $query->latest()->paginate(10);
            return view('asistencias.index', compact('datos'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al buscar');
        }
    }

    public function create()
    {
        try {
            if (session()->has('user')) {
                $estudiantes = Estudiante::all();
                $cursos = Curso::all();
                return view('asistencias.create', compact('estudiantes', 'cursos'));
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
                $asistencia = new Asistencia();
                $asistencia->id_estudiante = $request->input('id_estudiante');
                $asistencia->id_curso = $request->input('id_curso');
                $asistencia->fecha = $request->input('fecha');
                $asistencia->hora_entrada = $request->input('hora_entrada');
                $asistencia->hora_salida = $request->input('hora_salida');
                $asistencia->estado = $request->input('estado');
                $asistencia->justificacion = $request->input('justificacion');
                $asistencia->id_usuario = session('user')->id;

                if ($asistencia->save()) {
                    return redirect()->back()->with('error', 'Asistencia registrada con éxito');
                }

                return redirect()->back()->with('error', 'Error al registrar asistencia');
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
                $dato = Asistencia::with(['estudiante', 'curso', 'usuario'])->findOrFail($id);
                return view('asistencias.show', compact('dato'));
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
                $dato = Asistencia::findOrFail($id);
                $estudiantes = Estudiante::all();
                $cursos = Curso::all();
                return view('asistencias.edit', compact('dato', 'estudiantes', 'cursos'));
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
                $asistencia = Asistencia::findOrFail($id);
                $asistencia->id_estudiante = $request->input('id_estudiante');
                $asistencia->id_curso = $request->input('id_curso');
                $asistencia->fecha = $request->input('fecha');
                $asistencia->hora_entrada = $request->input('hora_entrada');
                $asistencia->hora_salida = $request->input('hora_salida');
                $asistencia->estado = $request->input('estado');
                $asistencia->justificacion = $request->input('justificacion');

                if ($asistencia->save()) {
                    return redirect()->back()->with('error', 'Asistencia actualizada con éxito');
                }

                return redirect()->back()->with('error', 'Error al actualizar asistencia');
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
                $asistencia = Asistencia::findOrFail($id);

                if ($asistencia->delete()) {
                    return redirect()->back()->with('error', 'Asistencia eliminada con éxito');
                }

                return redirect()->back()->with('error', 'Error al eliminar asistencia');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }

    // Método para mostrar formulario de asistencia masiva
    public function registrarMasivaForm()
    {
        try {
            if (session()->has('user')) {
                $cursos = Curso::all();
                return view('asistencias.registrar-masiva', compact('cursos'));
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar');
        }
    }

    // Método para registrar asistencia masiva
    public function registrarMasiva(Request $request)
    {
        try {
            if (session()->has('user')) {
                $curso_id = $request->input('curso_id');
                $fecha = $request->input('fecha');
                $asistencias = $request->input('asistencias', []);

                foreach ($asistencias as $estudiante_id => $estado) {
                    $asistencia = new Asistencia();
                    $asistencia->id_estudiante = $estudiante_id;
                    $asistencia->id_curso = $curso_id;
                    $asistencia->fecha = $fecha;
                    $asistencia->estado = $estado;
                    $asistencia->id_usuario = session('user')->id;
                    $asistencia->save();
                }

                return redirect()->back()->with('error', 'Asistencias registradas con éxito');
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar asistencias: ' . $e->getMessage());
        }
    }

    // Método para enviar correo de asistencia
    public function enviarcorreo($correo, $id)
    {
        Mail::to($correo)->send(new EviarCorreo($id));
    }

    // Método para enviar correo de destino
    public function enviarcorreodestino($id)
    {
        try {
            if (session()->has('user')) {
                $asistencia = Asistencia::with(['estudiante', 'curso', 'usuario'])->findOrFail($id);
                
                if ($asistencia->estudiante && $asistencia->estudiante->email) {
                    $this->enviarcorreo($asistencia->estudiante->email, $id);
                    return redirect()->back()->with('error', 'Correo enviado con éxito');
                } else {
                    return redirect()->back()->with('error', 'No se encontró email del estudiante');
                }
            } else {
                return redirect('/');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al enviar correo: ' . $e->getMessage());
        }
    }
} 