@extends('layouts.app')

@section('title', 'NUEVA MATERIA')

@section('content')
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>CREAR NUEVA MATERIA</h1>
<img class="logo_banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Información de la Materia</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('materias.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nombre_materia" class="form-label">Nombre de la Materia *</label>
                            <input type="text" class="form-control @error('nombre_materia') is-invalid @enderror" 
                                   id="nombre_materia" name="nombre_materia" 
                                   value="{{ old('nombre_materia') }}" required>
                            @error('nombre_materia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="detalle_materia" class="form-label">Detalle de la Materia</label>
                            <textarea class="form-control @error('detalle_materia') is-invalid @enderror" 
                                      id="detalle_materia" name="detalle_materia" 
                                      rows="4">{{ old('detalle_materia') }}</textarea>
                            @error('detalle_materia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                Descripción opcional de la materia, objetivos, contenido, etc.
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('materias.index') }}" class="btn btn-secondary me-md-2">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Guardar Materia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 