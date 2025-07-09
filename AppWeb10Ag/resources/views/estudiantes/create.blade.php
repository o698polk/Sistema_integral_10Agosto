@extends('layouts.app')

@section('title', 'REGISTRAR NUEVO ESTUDIANTE')

@section('content')
<div class="container-fluid container">
    <!-- Header con gradiente -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-gradient-primary text-white p-4 rounded-3 shadow">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-2">
                            <i class="fas fa-user-plus me-3"></i>
                            REGISTRAR NUEVO ESTUDIANTE
                        </h1>
                        <p class="text-white fs-5 mb-4">Registra un nuevo estudiante en el sistema educativo</p>
                        <img class="logo-banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-light btn-lg">
                            <i class="fas fa-arrow-left me-2"></i>
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-user-graduate me-2"></i>Información del Estudiante
                    </h5>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle me-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    <div class="alert alert-primary">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Información:</strong> El código del estudiante se generará automáticamente basado en el curso seleccionado y los últimos 4 dígitos de la cédula.
                    </div>

                    <form method="POST" action="{{ route('estudiantes.store') }}" enctype="multipart/form-data" id="estudianteForm">
                        @csrf
                        
                        <!-- Información Personal -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-user me-2"></i>Información Personal
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('curso_id') is-invalid @enderror" 
                                            id="curso_id" name="curso_id" required>
                                        <option value="">Seleccione un curso</option>
                                        @foreach($cursos as $curso)
                                            <option value="{{ $curso->id }}" 
                                                    data-codigo="{{ $curso->codigo_curso }}"
                                                    {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                                                {{ $curso->nombre_curso }} - {{ $curso->codigo_curso }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="curso_id">
                                        <i class="fas fa-graduation-cap me-2"></i>Curso *
                                    </label>
                                    @error('curso_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" 
                                           id="codigo_estudiante_preview" 
                                           placeholder="Código generado" readonly>
                                    <label for="codigo_estudiante_preview">
                                        <i class="fas fa-id-badge me-2"></i>Código del Estudiante
                                    </label>
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Se generará automáticamente al seleccionar el curso
                                    </small>
                                </div>
                            </div>

                            <!-- Campo oculto para el código del estudiante -->
                            <input type="hidden" name="codigo_estudiante" id="codigo_estudiante" value="">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('cedula') is-invalid @enderror" 
                                           id="cedula" name="cedula" 
                                           placeholder="Cédula" value="{{ old('cedula') }}" required maxlength="10">
                                    <label for="cedula">
                                        <i class="fas fa-id-card me-2"></i>Cédula *
                                    </label>
                                    @error('cedula')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" 
                                           id="nombres" name="nombres" 
                                           placeholder="Nombres" value="{{ old('nombres') }}" required>
                                    <label for="nombres">
                                        <i class="fas fa-user me-2"></i>Nombres *
                                    </label>
                                    @error('nombres')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('apellidos') is-invalid @enderror" 
                                           id="apellidos" name="apellidos" 
                                           placeholder="Apellidos" value="{{ old('apellidos') }}" required>
                                    <label for="apellidos">
                                        <i class="fas fa-user me-2"></i>Apellidos *
                                    </label>
                                    @error('apellidos')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                           id="fecha_nacimiento" name="fecha_nacimiento" 
                                           value="{{ old('fecha_nacimiento') }}" required>
                                    <label for="fecha_nacimiento">
                                        <i class="fas fa-calendar me-2"></i>Fecha de Nacimiento *
                                    </label>
                                    @error('fecha_nacimiento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select @error('genero') is-invalid @enderror" 
                                            id="genero" name="genero" required>
                                        <option value="">Seleccione género</option>
                                        <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                    <label for="genero">
                                        <i class="fas fa-venus-mars me-2"></i>Género *
                                    </label>
                                    @error('genero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Información de Contacto -->
                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-address-book me-2"></i>Información de Contacto
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                                           id="direccion" name="direccion" 
                                           placeholder="Dirección" value="{{ old('direccion') }}" required>
                                    <label for="direccion">
                                        <i class="fas fa-map-marker-alt me-2"></i>Dirección *
                                    </label>
                                    @error('direccion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" 
                                           id="telefono" name="telefono" 
                                           placeholder="Teléfono" value="{{ old('telefono') }}" maxlength="10">
                                    <label for="telefono">
                                        <i class="fas fa-phone me-2"></i>Teléfono
                                    </label>
                                    @error('telefono')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" 
                                           placeholder="Email" value="{{ old('email') }}">
                                    <label for="email">
                                        <i class="fas fa-envelope me-2"></i>Email
                                    </label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Información de Padres -->
                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-users me-2"></i>Información de Padres
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nombre_padre') is-invalid @enderror" 
                                           id="nombre_padre" name="nombre_padre" 
                                           placeholder="Nombre del padre" value="{{ old('nombre_padre') }}">
                                    <label for="nombre_padre">
                                        <i class="fas fa-male me-2"></i>Nombre del Padre
                                    </label>
                                    @error('nombre_padre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('telefono_padre') is-invalid @enderror" 
                                           id="telefono_padre" name="telefono_padre" 
                                           placeholder="Teléfono del padre" value="{{ old('telefono_padre') }}" maxlength="10">
                                    <label for="telefono_padre">
                                        <i class="fas fa-phone me-2"></i>Teléfono del Padre
                                    </label>
                                    @error('telefono_padre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nombre_madre') is-invalid @enderror" 
                                           id="nombre_madre" name="nombre_madre" 
                                           placeholder="Nombre de la madre" value="{{ old('nombre_madre') }}">
                                    <label for="nombre_madre">
                                        <i class="fas fa-female me-2"></i>Nombre de la Madre
                                    </label>
                                    @error('nombre_madre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="tel" class="form-control @error('telefono_madre') is-invalid @enderror" 
                                           id="telefono_madre" name="telefono_madre" 
                                           placeholder="Teléfono de la madre" value="{{ old('telefono_madre') }}" maxlength="10">
                                    <label for="telefono_madre">
                                        <i class="fas fa-phone me-2"></i>Teléfono de la Madre
                                    </label>
                                    @error('telefono_madre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <!-- Foto del Estudiante -->
                        <div class="row mb-4 mt-4">
                            <div class="col-12">
                                <h6 class="text-primary border-bottom pb-2">
                                    <i class="fas fa-camera me-2"></i>Foto del Estudiante
                                </h6>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                                           id="foto" name="foto" accept="image/*">
                                    <label for="foto">
                                        <i class="fas fa-image me-2"></i>Foto del Estudiante
                                    </label>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="preview-container" class="text-center" style="display: none;">
                                    <img id="foto-preview" src="" alt="Vista previa" 
                                         class="img-thumbnail rounded-circle" 
                                         style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg me-3">
                                    <i class="fas fa-save me-2"></i>Registrar Estudiante
                                </button>
                                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary btn-lg">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    color: #667eea;
}

.form-control:focus,
.form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.btn-primary {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(45deg, #764ba2, #667eea);
    transform: translateY(-1px);
}

/* Select2 Custom Styles */
.select2-container--bootstrap-5 .select2-selection {
    border: 2px solid #e9ecef;
    border-radius: 0.375rem;
    min-height: 58px;
    display: flex;
    align-items: center;
}

.select2-container--bootstrap-5 .select2-selection--single {
    background-color: #fff;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
    color: #495057;
    padding-left: 0;
    line-height: 1.5;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__placeholder {
    color: #6c757d;
}

.select2-container--bootstrap-5.select2-container--focus .select2-selection {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.select2-container--bootstrap-5 .select2-dropdown {
    border-color: #667eea;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.select2-container--bootstrap-5 .select2-results__option--highlighted[aria-selected] {
    background-color: #667eea;
}
</style>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
// Inicializar Select2 cuando el documento esté listo
$(document).ready(function() {
    $('#curso_id').select2({
        theme: 'bootstrap-5',
        placeholder: 'Seleccione un curso',
        allowClear: true,
        width: '100%'
    });

    // Generar código del estudiante cuando se selecciona un curso
    $('#curso_id').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        const codigoCurso = selectedOption.data('codigo');
        const cedula = $('#cedula').val();
        
        if (codigoCurso && cedula) {
            // Generar código: CURSO + ÚLTIMOS 4 DÍGITOS DE CÉDULA + AÑO ACTUAL
            const ultimosDigitos = cedula.slice(-4);
            const añoActual = new Date().getFullYear().toString().slice(-2);
            const codigoEstudiante = `${codigoCurso}${ultimosDigitos}${añoActual}`;
            
            $('#codigo_estudiante_preview').val(codigoEstudiante);
            $('#codigo_estudiante').val(codigoEstudiante);
        } else {
            $('#codigo_estudiante_preview').val('');
            $('#codigo_estudiante').val('');
        }
    });

    // Generar código cuando se ingresa la cédula
    $('#cedula').on('input', function() {
        const selectedOption = $('#curso_id').find('option:selected');
        const codigoCurso = selectedOption.data('codigo');
        const cedula = $(this).val();
        
        if (codigoCurso && cedula && cedula.length >= 4) {
            const ultimosDigitos = cedula.slice(-4);
            const añoActual = new Date().getFullYear().toString().slice(-2);
            const codigoEstudiante = `${codigoCurso}${ultimosDigitos}${añoActual}`;
            
            $('#codigo_estudiante_preview').val(codigoEstudiante);
            $('#codigo_estudiante').val(codigoEstudiante);
        }
    });
});

// Vista previa de la imagen
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('foto-preview');
    const container = document.getElementById('preview-container');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            container.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        container.style.display = 'none';
    }
});

// Validación del formulario
document.getElementById('estudianteForm').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    // Validar que se haya generado un código
    const codigoEstudiante = $('#codigo_estudiante').val();
    if (!codigoEstudiante) {
        alert('Por favor, seleccione un curso y complete la cédula para generar el código del estudiante.');
        e.preventDefault();
        return;
    }
    
    if (!isValid) {
        e.preventDefault();
        alert('Por favor, complete todos los campos obligatorios.');
    }
});

// Validación de cédula (solo números)
document.getElementById('cedula').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Validación de teléfonos (solo números)
document.querySelectorAll('input[type="tel"]').forEach(input => {
    input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>
@endsection 