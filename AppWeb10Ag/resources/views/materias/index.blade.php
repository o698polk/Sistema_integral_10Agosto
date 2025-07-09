@extends('layouts.app')

@section('title', 'MATERIAS')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>GESTIÓN DE MATERIAS</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<!-- Formulario de búsqueda -->
<form method="POST" action="{{route('materias.buscar')}}">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" name="filtro_nombre" placeholder="Buscar por nombre de materia" class="form-control">
                </div>
            </div>
            <div class="col-md-4">
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
            <a href="{{route('materias.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nueva Materia
            </a>
        </div>
    </div>
</div>

<br>

<!-- Tabla de materias -->
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
                <th>Nombre de la Materia</th>
                <th>Detalle</th>
                <th>Horarios Asignados</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->id_materia }}</td>
                <td>{{ $materia->nombre_materia }}</td>
                <td>
                    @if($materia->detalle_materia)
                        {{ Str::limit($materia->detalle_materia, 50) }}
                    @else
                        <span class="text-muted">Sin detalle</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-info">{{ $materia->horarios->count() }} horarios</span>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary btn-sm" href="{{route('materias.show', $materia->id_materia)}}">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{route('materias.edit', $materia->id_materia)}}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form class="deleteForm d-inline" action="{{route('materias.destroy', $materia->id_materia)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
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
        {{ $materias->links() }}
    </div>
</div>

<!-- Estadísticas rápidas -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Materias</h5>
                    <p class="card-text">{{ $materias->total() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Con Horarios</h5>
                    <p class="card-text">{{ $materias->where('horarios_count', '>', 0)->count() }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Sin Horarios</h5>
                    <p class="card-text">{{ $materias->where('horarios_count', 0)->count() }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 