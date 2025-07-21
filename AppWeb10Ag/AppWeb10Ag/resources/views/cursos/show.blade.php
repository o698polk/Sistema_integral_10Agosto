@extends('layouts.app')

@section('title', 'DETALLES DEL CURSO')

@section('content')
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">
                    <i class="fas fa-graduation-cap me-3"></i>DETALLES DEL CURSO
                </h1>
                <p class="text-white fs-5 mb-4">Información completa del curso seleccionado</p>
                <img class="logo-banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(session('error'))
                    <div class="alert alert-info alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Información Principal del Curso -->
                <div class="card shadow-lg border-0 mb-4">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h4 class="mb-0">
                            <i class="fas fa-graduation-cap me-2"></i>{{ $dato->nombre_curso }}
                        </h4>
                        <p class="mb-0 mt-2">
                            <span class="badge bg-light text-dark me-2">{{ $dato->codigo_curso }}</span>
                            <span class="badge bg-warning text-dark">ID: {{ $dato->id }}</span>
                        </p>
                    </div>
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="fas fa-info-circle me-2"></i>Descripción del Curso
                                </h5>
                                <p class="lead">{{ $dato->descripcion ?? 'Este curso no tiene descripción disponible.' }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="bg-light rounded p-3">
                                    <i class="fas fa-users fa-3x text-primary mb-2"></i>
                                    <h4 class="text-primary">{{ $dato->capacidad_maxima }}</h4>
                                    <p class="text-muted mb-0">Capacidad Máxima</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detalles del Curso -->
                <div class="row">
                    <!-- Información del Aula y Horario -->
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">
                                    <i class="fas fa-clock me-2"></i>Horario y Ubicación
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center p-3 bg-light rounded">
                                            <i class="fas fa-door-open fa-2x text-primary me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Aula</h6>
                                                <p class="mb-0 fw-bold">{{ $dato->aula }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center p-3 bg-light rounded">
                                            <i class="fas fa-calendar fa-2x text-success me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Días de Clase</h6>
                                                <p class="mb-0 fw-bold">{{ $dato->dias_clase }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center p-3 bg-light rounded">
                                            <i class="fas fa-play fa-2x text-info me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Hora de Inicio</h6>
                                                <p class="mb-0 fw-bold">{{ $dato->hora_inicio }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex align-items-center p-3 bg-light rounded">
                                            <i class="fas fa-stop fa-2x text-danger me-3"></i>
                                            <div>
                                                <h6 class="mb-1">Hora de Fin</h6>
                                                <p class="mb-0 fw-bold">{{ $dato->hora_fin }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profesor Asignado -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">
                                    <i class="fas fa-chalkboard-teacher me-2"></i>Profesor Asignado
                                </h5>
                            </div>
                            <div class="card-body">
                                @if($dato->usuario)
                                    <div class="d-flex align-items-center p-4 bg-light rounded">
                                        <img src="{{ $dato->usuario->imgprofile }}" alt="Profesor" 
                                             class="rounded-circle me-4" style="width: 80px; height: 80px; object-fit: cover;"
                                             onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                                        <div>
                                            <h5 class="mb-1">{{ $dato->usuario->nombre_apellido }}</h5>
                                            <p class="text-muted mb-2">
                                                <i class="fas fa-envelope me-1"></i>{{ $dato->usuario->correo }}
                                            </p>
                                            <p class="text-muted mb-0">
                                                <i class="fas fa-phone me-1"></i>{{ $dato->usuario->phones ?: 'Sin teléfono' }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center p-4">
                                        <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">Sin Profesor Asignado</h5>
                                        <p class="text-muted">Este curso aún no tiene un profesor asignado.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Información Adicional -->
                    <div class="col-lg-4">
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">
                                    <i class="fas fa-info-circle me-2"></i>Información Adicional
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <span class="text-muted">Fecha de Creación:</span>
                                        <span class="fw-bold">{{ $dato->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <span class="text-muted">Hora de Creación:</span>
                                        <span class="fw-bold">{{ $dato->created_at->format('H:i') }}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <span class="text-muted">Última Actualización:</span>
                                        <span class="fw-bold">{{ $dato->updated_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center p-2">
                                        <span class="text-muted">Hora de Actualización:</span>
                                        <span class="fw-bold">{{ $dato->updated_at->format('H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas Rápidas -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white border-0">
                                <h5 class="mb-0">
                                    <i class="fas fa-chart-bar me-2"></i>Estadísticas
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center">
                                    <div class="col-6 mb-3">
                                        <div class="bg-primary text-white rounded p-3">
                                            <i class="fas fa-users fa-2x mb-2"></i>
                                            <h6 class="mb-0">{{ $dato->capacidad_maxima }}</h6>
                                            <small>Capacidad</small>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="bg-success text-white rounded p-3">
                                            <i class="fas fa-clock fa-2x mb-2"></i>
                                            <h6 class="mb-0">{{ $dato->hora_inicio }}</h6>
                                            <small>Inicio</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <a href="{{ route('cursos.edit', $dato->id) }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-edit me-2"></i>Editar Curso
                            </a>
                            <a href="{{ route('cursos.index') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-arrow-left me-2"></i>Volver al Listado
                            </a>
                            <form class="d-inline deleteForm" action="{{ route('cursos.destroy', $dato->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-lg" 
                                        onclick="return confirm('¿Estás seguro de eliminar este curso? Esta acción no se puede deshacer.')">
                                    <i class="fas fa-trash me-2"></i>Eliminar Curso
                                </button>
                            </form>
                        </div>
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
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.card-header {
    background: linear-gradient(135deg, #dc3545 0%, #fd7e14 100%) !important;
    border: none;
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

.text-primary {
    color: #dc3545 !important;
}

.border-bottom {
    border-color: #dc3545 !important;
}

.bg-light {
    background-color: #f8f9fa !important;
}

@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }
    
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
    
    .d-flex.flex-wrap {
        flex-direction: column;
    }
    
    .d-flex.flex-wrap .btn {
        margin-bottom: 0.5rem;
    }
}
</style>
@endsection 