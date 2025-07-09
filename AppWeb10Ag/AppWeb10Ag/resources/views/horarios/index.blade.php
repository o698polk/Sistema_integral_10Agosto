@extends('layouts.app')

@section('title', 'HORARIOS')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>GESTIÓN DE HORARIOS</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<!-- Formulario de búsqueda -->
<form method="POST" action="{{route('horarios.buscar')}}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="filtro_docente" placeholder="Buscar por docente" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="filtro_materia" placeholder="Buscar por materia" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="filtro_curso" placeholder="Buscar por curso" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select name="filtro_dia" class="form-control">
                        <option value="">Todos los días</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-search"></i> Buscar
                </button>
                <a href="{{route('horarios.horarios-por-curso')}}" class="btn btn-success">
                    <i class="fas fa-table"></i> Consulta Especial
                </a>
            </div>
        </div>
    </div>
</form>

<br>

<!-- Botones de acción -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('horarios.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nuevo Horario
            </a>
        </div>
    </div>
</div>

<br>

<!-- Tabla de horarios -->
<div class="container scrollable-div">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Docente</th>
                <th>Materia</th>
                <th>Curso</th>
                <th>Día</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->id_horario }}</td>
                <td>
                    @if($horario->docente)
                        {{ $horario->docente->nombre_apellido }}
                    @else
                        <span class="text-muted">Docente no encontrado</span>
                    @endif
                </td>
                <td>
                    @if($horario->materia)
                        {{ $horario->materia->nombre_materia }}
                    @else
                        <span class="text-muted">Materia no encontrada</span>
                    @endif
                </td>
                <td>
                    @if($horario->curso)
                        {{ $horario->curso->nombre_curso }}
                    @else
                        <span class="text-muted">Curso no encontrado</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-primary">{{ $horario->dia }}</span>
                </td>
                <td>{{ $horario->hora_inicio }}</td>
                <td>{{ $horario->hora_fin }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary btn-sm" href="{{route('horarios.show', $horario->id_horario)}}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{route('horarios.edit', $horario->id_horario)}}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form class="deleteForm d-inline" action="{{route('horarios.destroy', $horario->id_horario)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este horario?')">
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
        {{ $horarios->links() }}
    </div>
</div>

<!-- Estadísticas rápidas -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Horarios</h5>
                    <p class="card-text">{{ $horarios->total() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Docentes Activos</h5>
                    <p class="card-text">{{ $horarios->unique('id_usuario')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Materias Dictadas</h5>
                    <p class="card-text">{{ $horarios->unique('id_materia')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Cursos con Horarios</h5>
                    <p class="card-text">{{ $horarios->unique('id_curso')->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 