@extends('layouts.app')

@section('title', 'CREAR NUEVO CURSO')

@section('content')
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">
                    <i class="fas fa-plus-circle me-3"></i>CREAR NUEVO CURSO
                </h1>
                <p class="text-white fs-5 mb-4">Registra un nuevo curso en el sistema educativo</p>
                <img class="logo-banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0">
                            <i class="fas fa-graduation-cap me-2"></i>Información del Curso
                        </h4>
                    </div>
                    <div class="card-body p-5">
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Por favor corrige los siguientes errores:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('cursos.store') }}" class="needs-validation" novalidate>
                            @csrf
                            
                            <!-- Información Básica del Curso -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary border-bottom pb-2 mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Información Básica
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="nombre_curso" id="nombre_curso" 
                                               class="form-control @error('nombre_curso') is-invalid @enderror" 
                                               placeholder="Nombre del Curso" required autofocus>
                                        <label for="nombre_curso">
                                            <i class="fas fa-book me-2"></i>Nombre del Curso
                                        </label>
                                        @error('nombre_curso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="codigo_curso" id="codigo_curso" 
                                               class="form-control @error('codigo_curso') is-invalid @enderror" 
                                               placeholder="Código del Curso" required>
                                        <label for="codigo_curso">
                                            <i class="fas fa-hashtag me-2"></i>Código del Curso
                                        </label>
                                        @error('codigo_curso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-floating">
                                        <textarea name="descripcion" id="descripcion" 
                                                  class="form-control @error('descripcion') is-invalid @enderror" 
                                                  placeholder="Descripción del curso" style="height: 100px"></textarea>
                                        <label for="descripcion">
                                            <i class="fas fa-align-left me-2"></i>Descripción del Curso
                                        </label>
                                        @error('descripcion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Configuración del Aula -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary border-bottom pb-2 mb-3">
                                        <i class="fas fa-door-open me-2"></i>Configuración del Aula
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="number" name="capacidad_maxima" id="capacidad_maxima" 
                                               class="form-control @error('capacidad_maxima') is-invalid @enderror" 
                                               placeholder="Capacidad Máxima" min="1" max="100" required>
                                        <label for="capacidad_maxima">
                                            <i class="fas fa-users me-2"></i>Capacidad Máxima
                                        </label>
                                        @error('capacidad_maxima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="aula" id="aula" 
                                               class="form-control @error('aula') is-invalid @enderror" 
                                               placeholder="Aula" required>
                                        <label for="aula">
                                            <i class="fas fa-door-open me-2"></i>Aula
                                        </label>
                                        @error('aula')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Horario del Curso -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-primary border-bottom pb-2 mb-3">
                                        <i class="fas fa-clock me-2"></i>Horario del Curso
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="time" name="hora_inicio" id="hora_inicio" 
                                               class="form-control @error('hora_inicio') is-invalid @enderror" 
                                               required>
                                        <label for="hora_inicio">
                                            <i class="fas fa-play me-2"></i>Hora de Inicio
                                        </label>
                                        @error('hora_inicio')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="time" name="hora_fin" id="hora_fin" 
                                               class="form-control @error('hora_fin') is-invalid @enderror" 
                                               required>
                                        <label for="hora_fin">
                                            <i class="fas fa-stop me-2"></i>Hora de Fin
                                        </label>
                                        @error('hora_fin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-floating">
                                        <select name="dias_clase" id="dias_clase" 
                                                class="form-select @error('dias_clase') is-invalid @enderror" required>
                                            <option value="">Selecciona los días de clase</option>
                                            <option value="L,M,M,J,V">Lunes a Viernes</option>
                                            <option value="L,M,M,J,V,S">Lunes a Sábado</option>
                                            <option value="L,M,M,J">Lunes a Jueves</option>
                                            <option value="M,J,V">Martes, Jueves, Viernes</option>
                                            <option value="L,M">Lunes y Miércoles</option>
                                            <option value="M,J">Martes y Jueves</option>
                                            <option value="L">Solo Lunes</option>
                                            <option value="M">Solo Martes</option>
                                            <option value="M">Solo Miércoles</option>
                                            <option value="J">Solo Jueves</option>
                                            <option value="V">Solo Viernes</option>
                                            <option value="S">Solo Sábado</option>
                                        </select>
                                        <label for="dias_clase">
                                            <i class="fas fa-calendar me-2"></i>Días de Clase
                                        </label>
                                        @error('dias_clase')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                          

                            <!-- Botones de Acción -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fas fa-save me-2"></i>Crear Curso
                                        </button>
                                        <a href="{{ route('cursos.index') }}" class="btn btn-secondary btn-lg">
                                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                                        </a>
                                        <button type="reset" class="btn btn-warning btn-lg">
                                            <i class="fas fa-undo me-2"></i>Limpiar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    position: relative;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
}

.card {
    border-radius: 15px;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%) !important;
    border: none;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .form-select:focus ~ label,
.form-floating > .form-select:not([value=""]):valid ~ label {
    color: #dc3545;
}

.form-control:focus,
.form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.btn-primary {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #c82333 0%, #e55a00 100%);
}

.text-primary {
    color: #dc3545 !important;
}

.border-bottom {
    border-color: #dc3545 !important;
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
}
</style>

<script>
// Validación del formulario
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Validación de hora de fin mayor que hora de inicio
document.getElementById('hora_fin').addEventListener('change', function() {
    const horaInicio = document.getElementById('hora_inicio').value;
    const horaFin = this.value;
    
    if (horaInicio && horaFin && horaFin <= horaInicio) {
        alert('La hora de fin debe ser posterior a la hora de inicio');
        this.value = '';
    }
});

// Validación de capacidad máxima
document.getElementById('capacidad_maxima').addEventListener('input', function() {
    const valor = parseInt(this.value);
    if (valor < 1) {
        this.value = 1;
    } else if (valor > 100) {
        this.value = 100;
    }
});

// Generar código automático basado en el nombre
document.getElementById('nombre_curso').addEventListener('input', function() {
    const nombre = this.value;
    const codigoInput = document.getElementById('codigo_curso');
    
    if (nombre && !codigoInput.value) {
        // Generar código automático (primeras letras de cada palabra)
        const palabras = nombre.split(' ');
        const codigo = palabras.map(palabra => palabra.charAt(0).toUpperCase()).join('');
        codigoInput.value = codigo;
    }
});
</script>
@endsection 