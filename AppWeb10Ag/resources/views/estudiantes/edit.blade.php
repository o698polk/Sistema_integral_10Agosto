 @extends('layouts.app')

@section('title', 'EDITAR ESTUDIANTE')

@section('content')
<div class="container-fluid container">
    <!-- Header con gradiente -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-gradient-primary text-white p-4 rounded-3 shadow">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-2">
                            <i class="fas fa-user-edit me-3"></i>
                            EDITAR ESTUDIANTE
                        </h1>
                        <p class="text-white fs-5 mb-4">Modifica la información del estudiante seleccionado</p>
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

                    <form method="POST" action="{{ route('estudiantes.update', $dato->id) }}" enctype="multipart/form-data" id="estudianteForm">
                        @csrf
                        @method('PUT')
                        
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
                                    <input type="text" class="form-control @error('codigo_estudiante') is-invalid @enderror" 
                                           id="codigo_estudiante" name="codigo_estudiante" 
                                           placeholder="Código del estudiante" value="{{ old('codigo_estudiante', $dato->codigo_estudiante) }}" required>
                                    <label for="codigo_estudiante">
                                        <i class="fas fa-id-badge me-2"></i>Código del Estudiante *
                                    </label>
                                    @error('codigo_estudiante')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('cedula') is-invalid @enderror" 
                                           id="cedula" name="cedula" 
                                           placeholder="Cédula" value="{{ old('cedula', $dato->cedula) }}" required maxlength="10">
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
                                           placeholder="Nombres" value="{{ old('nombres', $dato->nombres) }}" required>
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
                                           placeholder="Apellidos" value="{{ old('apellidos', $dato->apellidos) }}" required>
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
                                           value="{{ old('fecha_nacimiento', $dato->fecha_nacimiento) }}" required>
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
                                        <option value="Masculino" {{ (old('genero', $dato->genero) == 'Masculino') ? 'selected' : '' }}>Masculino</option>
                                        <option value="Femenino" {{ (old('genero', $dato->genero) == 'Femenino') ? 'selected' : '' }}>Femenino</option>
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
                                           placeholder="Dirección" value="{{ old('direccion', $dato->direccion) }}" required>
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
                                           placeholder="Teléfono" value="{{ old('telefono', $dato->telefono) }}" maxlength="10">
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
                                           placeholder="Email" value="{{ old('email', $dato->email) }}">
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
                                           placeholder="Nombre del padre" value="{{ old('nombre_padre', $dato->nombre_padre) }}">
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
                                           placeholder="Teléfono del padre" value="{{ old('telefono_padre', $dato->telefono_padre) }}" maxlength="10">
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
                                           placeholder="Nombre de la madre" value="{{ old('nombre_madre', $dato->nombre_madre) }}">
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
                                           placeholder="Teléfono de la madre" value="{{ old('telefono_madre', $dato->telefono_madre) }}" maxlength="10">
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
                                        <i class="fas fa-image me-2"></i>Nueva Foto del Estudiante
                                    </label>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div id="preview-container" class="text-center">
                                    @if($dato->foto)
                                        <img src="{{ asset($dato->foto) }}" alt="Foto actual" 
                                             class="img-thumbnail rounded-circle" 
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                        <p class="text-muted mt-2">Foto actual</p>
                                    @else
                                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" 
                                             style="width: 150px; height: 150px;">
                                            <i class="fas fa-user fa-3x text-muted"></i>
                                        </div>
                                        <p class="text-muted mt-2">Sin foto</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg me-3">
                                    <i class="fas fa-save me-2"></i>Actualizar Estudiante
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
</style>

<script>
// Vista previa de la imagen
document.getElementById('foto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('preview-container');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" alt="Vista previa" 
                     class="img-thumbnail rounded-circle" 
                     style="width: 150px; height: 150px; object-fit: cover;">
                <p class="text-muted mt-2">Vista previa</p>
            `;
        }
        reader.readAsDataURL(file);
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