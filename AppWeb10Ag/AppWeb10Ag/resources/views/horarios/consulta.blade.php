@extends('layouts.app')

@section('title', 'CONSULTA DE HORARIOS')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>CONSULTA ESPECIAL DE HORARIOS</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-table"></i> 
                        Horarios por Curso - Docente - Materia
                    </h5>
                    <small class="text-muted">
                        Consulta que lista el nombre del curso, docente asignado, materia que dicta y horario completo
                    </small>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Curso</th>
                                    <th>Docente</th>
                                    <th>Materia</th>
                                    <th>Día</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Duración</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($horarios as $horario)
                                <tr>
                                    <td>
                                        <strong>{{ $horario->curso->nombre_curso ?? 'N/A' }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">
                                            {{ $horario->docente->nombre_apellido ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <em>{{ $horario->materia->nombre_materia ?? 'N/A' }}</em>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $horario->dia }}</span>
                                    </td>
                                    <td>
                                        <span class="text-success">{{ $horario->hora_inicio }}</span>
                                    </td>
                                    <td>
                                        <span class="text-danger">{{ $horario->hora_fin }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $inicio = \Carbon\Carbon::parse($horario->hora_inicio);
                                            $fin = \Carbon\Carbon::parse($horario->hora_fin);
                                            $duracion = $inicio->diffInMinutes($fin);
                                        @endphp
                                        <span class="badge bg-secondary">{{ $duracion }} min</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle"></i>
                                            No hay horarios registrados en el sistema.
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Resumen estadístico -->
                    @if($horarios->count() > 0)
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body text-center">
                                    <h6>Total Horarios</h6>
                                    <h3>{{ $horarios->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body text-center">
                                    <h6>Cursos Únicos</h6>
                                    <h3>{{ $horarios->unique('id_curso')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body text-center">
                                    <h6>Docentes Únicos</h6>
                                    <h3>{{ $horarios->unique('id_usuario')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body text-center">
                                    <h6>Materias Únicas</h6>
                                    <h3>{{ $horarios->unique('id_materia')->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 