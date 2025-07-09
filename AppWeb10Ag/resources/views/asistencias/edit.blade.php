@extends('layouts.app')

@section('title', 'EDITAR ASISTENCIA')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>EDITAR ASISTENCIA</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-edit"></i> Editar Asistencia</h4>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-info">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('asistencias.update', $dato->id)}}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_estudiante">
                                        <i class="fas fa-user-graduate"></i> Estudiante *
                                    </label>
                                    <select name="id_estudiante" id="id_estudiante" class="form-control" required>
                                        <option value="">Seleccione un estudiante</option>
                                        @foreach($estudiantes as $estudiante)
                                            <option value="{{ $estudiante->id }}" 
                                                {{ $dato->id_estudiante == $estudiante->id ? 'selected' : '' }}>
                                                {{ $estudiante->nombres }} {{ $estudiante->apellidos }} - {{ $estudiante->cedula }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_curso">
                                        <i class="fas fa-book"></i> Curso *
                                    </label>
                                    <select name="id_curso" id="id_curso" class="form-control" required>
                                        <option value="">Seleccione un curso</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{ $curso->id }}" 
                                                {{ $dato->id_curso == $curso->id ? 'selected' : '' }}>
                                                {{ $curso->nombre_curso }} - {{ $curso->codigo_curso }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">
                                        <i class="fas fa-calendar"></i> Fecha *
                                    </label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" 
                                           value="{{ $dato->fecha }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_entrada">
                                        <i class="fas fa-clock"></i> Hora de Entrada
                                    </label>
                                    <input type="time" name="hora_entrada" id="hora_entrada" class="form-control" 
                                           value="{{ $dato->hora_entrada }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_salida">
                                        <i class="fas fa-clock"></i> Hora de Salida
                                    </label>
                                    <input type="time" name="hora_salida" id="hora_salida" class="form-control" 
                                           value="{{ $dato->hora_salida }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">
                                        <i class="fas fa-check-circle"></i> Estado *
                                    </label>
                                    <select name="estado" id="estado" class="form-control" required>
                                        <option value="">Seleccione el estado</option>
                                        <option value="Presente" {{ $dato->estado == 'Presente' ? 'selected' : '' }}>Presente</option>
                                        <option value="Ausente" {{ $dato->estado == 'Ausente' ? 'selected' : '' }}>Ausente</option>
                                        <option value="Tardanza" {{ $dato->estado == 'Tardanza' ? 'selected' : '' }}>Tardanza</option>
                                        <option value="Justificado" {{ $dato->estado == 'Justificado' ? 'selected' : '' }}>Justificado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="justificacion">
                                        <i class="fas fa-file-alt"></i> Justificación
                                    </label>
                                    <textarea name="justificacion" id="justificacion" class="form-control" 
                                              rows="3" placeholder="Descripción de la justificación (opcional)">{{ $dato->justificacion }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> ACTUALIZAR ASISTENCIA
                            </button>
                            <a href="{{route('asistencias.index')}}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> CANCELAR
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 