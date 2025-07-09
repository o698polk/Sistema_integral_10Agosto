@extends('layouts.app')

@section('title', 'ASISTENCIAS')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>GESTIÓN DE ASISTENCIAS</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<!-- Formulario de búsqueda -->
<form method="POST" action="{{route('asistencias.buscar')}}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="filtro_estudiante" placeholder="Buscar por estudiante" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="filtro_curso" placeholder="Buscar por curso" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="date" name="filtro_fecha" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </div>
    </div>
</form>

<br>

<!-- Botones de acción -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('asistencias.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Registrar Asistencia
            </a>
            <a href="{{route('asistencias.registrar-masiva')}}" class="btn btn-warning">
                <i class="fas fa-users"></i> Asistencia Masiva
            </a>
            <button onclick="imprimirDiv()" class="btn btn-success">
                <i class="fas fa-print"></i> Imprimir
            </button>
        </div>
    </div>
</div>

<br>

<!-- Tabla de asistencias -->
<div class="container scrollable-div" id="reportid">
    @if(session('error'))
        <div class="alert alert-info">
            {{ session('error') }}
        </div>
    @endif

    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th>
                <th>Estado</th>
                <th>Justificación</th>
                <th>Registrado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->id }}</td>
                <td>
                    @if($dato->estudiante)
                        {{ $dato->estudiante->nombres }} {{ $dato->estudiante->apellidos }}
                    @else
                        <span class="text-muted">Estudiante no encontrado</span>
                    @endif
                </td>
                <td>
                    @if($dato->curso)
                        {{ $dato->curso->nombre_curso }}
                    @else
                        <span class="text-muted">Curso no encontrado</span>
                    @endif
                </td>
                <td>{{ $dato->fecha }}</td>
                <td>{{ $dato->hora_entrada ?? 'No registrada' }}</td>
                <td>{{ $dato->hora_salida ?? 'No registrada' }}</td>
                <td>
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
                </td>
                <td>{{ $dato->justificacion ?? 'Sin justificación' }}</td>
                <td>
                    @if($dato->usuario)
                        {{ $dato->usuario->nombre_apellido }}
                    @else
                        <span class="text-muted">Usuario no encontrado</span>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary btn-sm" href="{{route('asistencias.show', $dato->id)}}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{route('asistencias.edit', $dato->id)}}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form class="deleteForm d-inline" action="{{route('asistencias.destroy', $dato->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $datos->links() }}
    </div>
</div>

<!-- Estadísticas rápidas -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Presentes</h5>
                    <p class="card-text">{{ $datos->where('estado', 'Presente')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Ausentes</h5>
                    <p class="card-text">{{ $datos->where('estado', 'Ausente')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Tardanzas</h5>
                    <p class="card-text">{{ $datos->where('estado', 'Tardanza')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Justificados</h5>
                    <p class="card-text">{{ $datos->where('estado', 'Justificado')->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 