<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'GESTIÓN DE USUARIOS')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">
                    <i class="fas fa-users me-3"></i>GESTIÓN DE USUARIOS
                </h1>
                <p class="text-white fs-5 mb-4">Administra todos los usuarios del sistema educativo</p>
                <img class="logo-banner" src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <!-- Filtros de búsqueda -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('buscarus') }}" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="filtro_nombre" placeholder="Buscar por correo" 
                                           class="form-control" id="filtroCorreo">
                                    <label for="filtroCorreo">
                                        <i class="fas fa-search me-2"></i>Buscar por correo
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select name="filtro_rol" class="form-select" id="filtroRol">
                                        <option value="">Todos los roles</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Profesor">Profesor</option>
                                        <option value="Estudiante">Estudiante</option>
                                    </select>
                                    <label for="filtroRol">
                                        <i class="fas fa-user-tag me-2"></i>Filtrar por rol
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100 h-100">
                                    <i class="fas fa-search me-2"></i>Buscar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(session('user')->roles == 'Administrador')
        <!-- Botones de acción -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-plus me-2"></i>Crear Usuario
                    </a>
                    <button onclick="imprimirDiv()" class="btn btn-success btn-lg">
                        <i class="fas fa-print me-2"></i>Imprimir
                    </button>
                    <button class="btn btn-info btn-lg" onclick="exportarExcel()">
                        <i class="fas fa-file-excel me-2"></i>Exportar Excel
                    </button>
                </div>
            </div>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-users fa-2x mb-2"></i>
                        <h4 class="card-title">{{ $datos->count() }}</h4>
                        <p class="card-text">Total Usuarios</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-shield fa-2x mb-2"></i>
                        <h4 class="card-title">{{ $datos->where('roles', 'Administrador')->count() }}</h4>
                        <p class="card-text">Administradores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                        <h4 class="card-title">{{ $datos->where('roles', 'Profesor')->count() }}</h4>
                        <p class="card-text">Profesores</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-user-graduate fa-2x mb-2"></i>
                        <h4 class="card-title">{{ $datos->where('roles', 'Estudiante')->count() }}</h4>
                        <p class="card-text">Estudiantes</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de usuarios -->
        <div class="card shadow-sm border-0" id="reportid">
            <div class="card-header bg-white border-0">
                <h5 class="card-title mb-0">
                    <i class="fas fa-table me-2"></i>Lista de Usuarios
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 60px;">ID</th>
                                <th style="width: 80px;">Foto</th>
                                <th>Nombre Completo</th>
                                <th>Usuario</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Cédula</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th class="text-center" style="width: 150px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datos as $dato)
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-secondary">{{ $dato['id'] }}</span>
                                </td>
                                <td class="text-center">
                                    <img src="{{ $dato['imgprofile'] }}" alt="Avatar" 
                                         class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;"
                                         onerror="this.src='{{ asset('img/default-avatar.png') }}'">
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $dato['nombre_apellido'] }}</div>
                                    <small class="text-muted">{{ $dato['address'] ?: 'Sin dirección' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $dato['usuario'] }}</span>
                                </td>
                                <td>
                                    <a href="mailto:{{ $dato['correo'] }}" class="text-decoration-none">
                                        <i class="fas fa-envelope me-1"></i>{{ $dato['correo'] }}
                                    </a>
                                </td>
                                <td>
                                    @if($dato['roles'] == 'Administrador')
                                        <span class="badge bg-danger">{{ $dato['roles'] }}</span>
                                    @elseif($dato['roles'] == 'Profesor')
                                        <span class="badge bg-warning text-dark">{{ $dato['roles'] }}</span>
                                    @else
                                        <span class="badge bg-info">{{ $dato['roles'] }}</span>
                                    @endif
                                </td>
                                <td>
                                    <code>{{ $dato['dni'] ?: 'Sin cédula' }}</code>
                                </td>
                                <td>
                                    @if($dato['phones'])
                                        <a href="tel:{{ $dato['phones'] }}" class="text-decoration-none">
                                            <i class="fas fa-phone me-1"></i>{{ $dato['phones'] }}
                                        </a>
                                    @else
                                        <span class="text-muted">Sin teléfono</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check-circle me-1"></i>Activo
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('usuarios.edit', $dato['id']) }}" 
                                           class="btn btn-outline-primary btn-sm" 
                                           title="Editar usuario">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" 
                                                class="btn btn-outline-info btn-sm" 
                                                onclick="verDetalles({{ $dato['id'] }})"
                                                title="Ver detalles">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <form class="d-inline deleteForm" 
                                              action="{{ route('usuarios.destroy', $dato['id']) }}" 
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
                                                    title="Eliminar usuario">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Mostrando {{ $datos->firstItem() ?? 0 }} a {{ $datos->lastItem() ?? 0 }} 
                        de {{ $datos->total() }} usuarios
                    </div>
                    <div>
                        {{ $datos->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Modal para detalles del usuario -->
<div class="modal fade" id="detallesModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-user me-2"></i>Detalles del Usuario
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detallesContent">
                <!-- Contenido dinámico -->
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
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
    margin: 0 1px;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    color: #dc3545;
}

.form-control:focus,
.form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.badge {
    font-size: 0.75rem;
    padding: 0.5em 0.75em;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group {
        flex-direction: column;
    }
    
    .btn-group .btn {
        margin: 1px 0;
    }
}
</style>

<script>
function verDetalles(id) {
    // Aquí puedes implementar la lógica para cargar los detalles del usuario
    // Por ahora solo mostramos un mensaje
    document.getElementById('detallesContent').innerHTML = `
        <div class="text-center">
            <i class="fas fa-spinner fa-spin fa-2x text-primary mb-3"></i>
            <p>Cargando detalles del usuario...</p>
        </div>
    `;
    new bootstrap.Modal(document.getElementById('detallesModal')).show();
}

function exportarExcel() {
    // Implementar exportación a Excel
    alert('Función de exportación a Excel en desarrollo');
}

function imprimirDiv() {
    const contenido = document.getElementById('reportid').innerHTML;
    const ventana = window.open('', '_blank');
    ventana.document.write(`
        <html>
            <head>
                <title>Reporte de Usuarios</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    @media print {
                        .btn { display: none !important; }
                        .pagination { display: none !important; }
                    }
                </style>
            </head>
            <body>
                <div class="container mt-4">
                    <h2 class="text-center mb-4">Reporte de Usuarios - Colegio 10 de Agosto</h2>
                    ${contenido}
                </div>
            </body>
        </html>
    `);
    ventana.document.close();
    ventana.print();
}
</script>
@endsection
