@extends('layouts.app')

@section('title', 'DETALLES DE ASISTENCIA')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>DETALLES DE ASISTENCIA</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-eye"></i> Información de Asistencia</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong><i class="fas fa-user-graduate"></i> Estudiante:</strong></label>
                                <p class="form-control-static">
                                    @if($dato->estudiante)
                                        {{ $dato->estudiante->nombres }} {{ $dato->estudiante->apellidos }}
                                    @else
                                        <span class="text-muted">Estudiante no encontrado</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong><i class="fas fa-book"></i> Curso:</strong></label>
                                <p class="form-control-static">
                                    @if($dato->curso)
                                        {{ $dato->curso->nombre_curso }} - {{ $dato->curso->codigo_curso }}
                                    @else
                                        <span class="text-muted">Curso no encontrado</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong><i class="fas fa-calendar"></i> Fecha:</strong></label>
                                <p class="form-control-static">{{ $dato->fecha }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong><i class="fas fa-clock"></i> Hora Entrada:</strong></label>
                                <p class="form-control-static">{{ $dato->hora_entrada ?? 'No registrada' }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><strong><i class="fas fa-clock"></i> Hora Salida:</strong></label>
                                <p class="form-control-static">{{ $dato->hora_salida ?? 'No registrada' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong><i class="fas fa-check-circle"></i> Estado:</strong></label>
                                <p class="form-control-static">
                                    @if($dato->estado == 'Presente')
                                        <span class="badge bg-success">{{ $dato->estado }}</span>
                                    @elseif($dato->estado == 'Ausente')
                                        <span class="badge bg-danger">{{ $dato->estado }}</span>
                                    @elseif($dato->estado == 'Tardanza')
                                        <span class="badge bg-warning">{{ $dato->estado }}</span>
                                    @elseif($dato->estado == 'Justificado')
                                        <span class="badge bg-info">{{ $dato->estado }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $dato->estado ?? 'No definido' }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><strong><i class="fas fa-user"></i> Registrado por:</strong></label>
                                <p class="form-control-static">
                                    @if($dato->usuario)
                                        {{ $dato->usuario->nombre_apellido }}
                                    @else
                                        <span class="text-muted">Usuario no encontrado</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><strong><i class="fas fa-file-alt"></i> Justificación:</strong></label>
                                <p class="form-control-static">
                                    {{ $dato->justificacion ?? 'Sin justificación' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{route('asistencias.edit', $dato->id)}}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> EDITAR
                        </a>
                        <a href="{{route('asistencias.index')}}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> VOLVER
                        </a>
                        <form class="deleteForm d-inline" action="{{route('asistencias.destroy', $dato->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?')">
                                <i class="fas fa-trash"></i> ELIMINAR
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 