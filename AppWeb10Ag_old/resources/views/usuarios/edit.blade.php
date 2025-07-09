<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'EDITAR USUARIO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">
                    <i class="fas fa-user-edit me-3"></i>EDITAR USUARIO
                </h1>
                <p class="text-white fs-5 mb-4">Modifica la información del usuario seleccionado</p>
                <img class="logo-banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
            </div>
        </div>
    </div>
</div>

@if(session('user')->roles == 'Administrador')
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-warning text-dark text-center py-4">
                        <h4 class="mb-0">
                            <i class="fas fa-user-edit me-2"></i>Editar Información del Usuario
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

                        <!-- Información actual del usuario -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $datos->imgprofile }}" alt="Avatar" 
                                             class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;"
                                             onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                                        <div>
                                            <h6 class="mb-1">Editando usuario: <strong>{{ $datos->nombre_apellido }}</strong></h6>
                                            <small class="text-muted">ID: {{ $datos->id }} | Rol: {{ $datos->roles }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('usuarios.update', $datos->id) }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $datos->id }}">
                            
                            <!-- Información Personal -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-warning border-bottom pb-2 mb-3">
                                        <i class="fas fa-user me-2"></i>Información Personal
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="nombre_apellido" id="nombre_apellido" 
                                               class="form-control @error('nombre_apellido') is-invalid @enderror" 
                                               value="{{ $datos->nombre_apellido }}" placeholder="Nombres y Apellidos" required>
                                        <label for="nombre_apellido">
                                            <i class="fas fa-user me-2"></i>Nombres y Apellidos
                                        </label>
                                        @error('nombre_apellido')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="usuario" id="usuario" 
                                               class="form-control @error('usuario') is-invalid @enderror" 
                                               value="{{ $datos->usuario }}" placeholder="Nombre de Usuario">
                                        <label for="usuario">
                                            <i class="fas fa-at me-2"></i>Nombre de Usuario
                                        </label>
                                        @error('usuario')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Contacto -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-warning border-bottom pb-2 mb-3">
                                        <i class="fas fa-envelope me-2"></i>Información de Contacto
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="email" name="correo" id="correo" 
                                               class="form-control @error('correo') is-invalid @enderror" 
                                               value="{{ $datos->correo }}" placeholder="Correo Electrónico" required>
                                        <label for="correo">
                                            <i class="fas fa-envelope me-2"></i>Correo Electrónico
                                        </label>
                                        @error('correo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="tel" name="phones" id="phones" 
                                               class="form-control @error('phones') is-invalid @enderror" 
                                               value="{{ $datos->phones }}" placeholder="Teléfono" maxlength="10">
                                        <label for="phones">
                                            <i class="fas fa-phone me-2"></i>Teléfono
                                        </label>
                                        @error('phones')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Información de Seguridad -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-warning border-bottom pb-2 mb-3">
                                        <i class="fas fa-shield-alt me-2"></i>Información de Seguridad
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="password" name="clave" id="clave" 
                                               class="form-control @error('clave') is-invalid @enderror" 
                                               placeholder="Contraseña (dejar vacío para mantener la actual)">
                                        <label for="clave">
                                            <i class="fas fa-lock me-2"></i>Nueva Contraseña
                                        </label>
                                        @error('clave')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-text">
                                            <i class="fas fa-info-circle me-1"></i>
                                            Deja vacío para mantener la contraseña actual
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <select name="roles" id="roles" 
                                                class="form-select @error('roles') is-invalid @enderror" required>
                                            <option value="{{ $datos->roles }}" selected>{{ $datos->roles }}</option>
                                            @if($datos->roles != 'Estudiante')
                                                <option value="Estudiante">Estudiante</option>
                                            @endif
                                            @if($datos->roles != 'Profesor')
                                                <option value="Profesor">Profesor</option>
                                            @endif
                                            @if($datos->roles != 'Administrador')
                                                <option value="Administrador">Administrador</option>
                                            @endif
                                        </select>
                                        <label for="roles">
                                            <i class="fas fa-user-tag me-2"></i>Rol del Usuario
                                        </label>
                                        @error('roles')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Información Adicional -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-warning border-bottom pb-2 mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Información Adicional
                                    </h5>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="dni" id="dni" 
                                               class="form-control @error('dni') is-invalid @enderror" 
                                               value="{{ $datos->dni }}" placeholder="Cédula de Identidad" maxlength="10">
                                        <label for="dni">
                                            <i class="fas fa-id-card me-2"></i>Cédula de Identidad
                                        </label>
                                        @error('dni')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="account" id="account" 
                                               class="form-control @error('account') is-invalid @enderror" 
                                               value="{{ $datos->account }}" placeholder="Cuenta Bancaria" maxlength="10">
                                        <label for="account">
                                            <i class="fas fa-university me-2"></i>Cuenta Bancaria
                                        </label>
                                        @error('account')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-floating">
                                        <input type="text" name="address" id="address" 
                                               class="form-control @error('address') is-invalid @enderror" 
                                               value="{{ $datos->address }}" placeholder="Dirección">
                                        <label for="address">
                                            <i class="fas fa-map-marker-alt me-2"></i>Dirección
                                        </label>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Foto de Perfil -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h5 class="text-warning border-bottom pb-2 mb-3">
                                        <i class="fas fa-camera me-2"></i>Foto de Perfil
                                    </h5>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-center">
                                        <img src="{{ $datos->imgprofile }}" alt="Foto actual" 
                                             class="img-thumbnail rounded-circle" style="width: 120px; height: 120px; object-fit: cover;"
                                             onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                                        <p class="text-muted mt-2">Foto actual</p>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <div class="form-floating">
                                        <input type="file" name="imgprofile" id="imgprofile" 
                                               class="form-control @error('imgprofile') is-invalid @enderror" 
                                               accept="image/*">
                                        <label for="imgprofile">
                                            <i class="fas fa-image me-2"></i>Nueva Imagen
                                        </label>
                                        @error('imgprofile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB. Deja vacío para mantener la imagen actual.
                                    </div>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                                        <button type="submit" class="btn btn-warning btn-lg">
                                            <i class="fas fa-save me-2"></i>Actualizar Usuario
                                        </button>
                                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary btn-lg">
                                            <i class="fas fa-arrow-left me-2"></i>Cancelar
                                        </a>
                                        <button type="reset" class="btn btn-info btn-lg" onclick="restaurarValoresOriginales()">
                                            <i class="fas fa-undo me-2"></i>Restaurar
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
@else
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body text-center p-5">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4 class="text-warning">Acceso Denegado</h4>
                        <p class="text-muted">No tienes permisos para editar usuarios. Solo los administradores pueden realizar esta acción.</p>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left me-2"></i>Volver al Listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

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
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
    border: none;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .form-select:focus ~ label,
.form-floating > .form-select:not([value=""]):valid ~ label {
    color: #fd7e14;
}

.form-control:focus,
.form-select:focus {
    border-color: #fd7e14;
    box-shadow: 0 0 0 0.2rem rgba(253, 126, 20, 0.25);
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

.btn-warning {
    background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    border: none;
    color: #000;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #e0a800 0%, #e55a00 100%);
    color: #000;
}

.text-warning {
    color: #fd7e14 !important;
}

.border-bottom {
    border-color: #fd7e14 !important;
}

.alert-info {
    background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
    border: 1px solid #bee5eb;
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
// Valores originales para restaurar
const valoresOriginales = {
    nombre_apellido: '{{ $datos->nombre_apellido }}',
    usuario: '{{ $datos->usuario }}',
    correo: '{{ $datos->correo }}',
    phones: '{{ $datos->phones }}',
    dni: '{{ $datos->dni }}',
    address: '{{ $datos->address }}',
    account: '{{ $datos->account }}',
    roles: '{{ $datos->roles }}'
};

// Función para restaurar valores originales
function restaurarValoresOriginales() {
    document.getElementById('nombre_apellido').value = valoresOriginales.nombre_apellido;
    document.getElementById('usuario').value = valoresOriginales.usuario;
    document.getElementById('correo').value = valoresOriginales.correo;
    document.getElementById('phones').value = valoresOriginales.phones;
    document.getElementById('dni').value = valoresOriginales.dni;
    document.getElementById('address').value = valoresOriginales.address;
    document.getElementById('account').value = valoresOriginales.account;
    document.getElementById('roles').value = valoresOriginales.roles;
    document.getElementById('clave').value = '';
    document.getElementById('imgprofile').value = '';
    
    // Mostrar mensaje de confirmación
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-success alert-dismissible fade show';
    alertDiv.innerHTML = `
        <i class="fas fa-check-circle me-2"></i>
        Valores restaurados correctamente
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    document.querySelector('.card-body').insertBefore(alertDiv, document.querySelector('form'));
}

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

// Previsualización de imagen
document.getElementById('imgprofile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) { // 2MB
            alert('La imagen es demasiado grande. El tamaño máximo es 2MB.');
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            // Aquí puedes agregar previsualización si lo deseas
        };
        reader.readAsDataURL(file);
    }
});

// Validación de teléfono (solo números)
document.getElementById('phones').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Validación de cédula (solo números)
document.getElementById('dni').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Validación de cuenta bancaria (solo números)
document.getElementById('account').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});

// Confirmación antes de enviar el formulario
document.querySelector('form').addEventListener('submit', function(e) {
    if (!confirm('¿Estás seguro de que deseas actualizar este usuario?')) {
        e.preventDefault();
    }
});
</script>
@endsection
