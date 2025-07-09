

<?php $__env->startSection('title', 'GESTIÓN DE CURSOS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid page-header py-5 mb-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">
                    <i class="fas fa-graduation-cap me-3"></i>GESTIÓN DE CURSOS
                </h1>
                <p class="text-white fs-5 mb-4">Administra todos los cursos del sistema educativo</p>
                <img class="logo-banner" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
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
                        <form method="POST" action="<?php echo e(route('buscarcursos')); ?>" class="row g-3">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="filtro_nombre" placeholder="Buscar por nombre del curso" 
                                           class="form-control" id="filtroNombre">
                                    <label for="filtroNombre">
                                        <i class="fas fa-search me-2"></i>Buscar por nombre
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="filtro_codigo" placeholder="Buscar por código del curso" 
                                           class="form-control" id="filtroCodigo">
                                    <label for="filtroCodigo">
                                        <i class="fas fa-hashtag me-2"></i>Buscar por código
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

        <!-- Botones de acción -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo e(route('cursos.create')); ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus me-2"></i>Crear Curso
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
                        <i class="fas fa-graduation-cap fa-2x mb-2"></i>
                        <h4 class="card-title"><?php echo e($datos->total()); ?></h4>
                        <p class="card-text">Total de Cursos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-check-circle fa-2x mb-2"></i>
                        <h4 class="card-title"><?php echo e($datos->count()); ?></h4>
                        <p class="card-text">Cursos Activos</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-chalkboard-teacher fa-2x mb-2"></i>
                        <h4 class="card-title"><?php echo e($datos->whereNotNull('usuario')->count()); ?></h4>
                        <p class="card-text">Con Profesor</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white border-0 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-exclamation-triangle fa-2x mb-2"></i>
                        <h4 class="card-title"><?php echo e($datos->whereNull('usuario')->count()); ?></h4>
                        <p class="card-text">Sin Profesor</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de cursos -->
        <div class="card shadow-sm border-0" id="reportid">
            <div class="card-header bg-white border-0">
                <h5 class="card-title mb-0">
                    <i class="fas fa-table me-2"></i>Lista de Cursos
                </h5>
            </div>
            <div class="card-body p-0">
                <?php if(session('error')): ?>
                    <div class="alert alert-info alert-dismissible fade show m-3" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 60px;">ID</th>
                                <th style="width: 80px;">Código</th>
                                <th>Nombre del Curso</th>
                                <th>Descripción</th>
                                <th>Capacidad</th>
                                <th>Aula</th>
                                <th>Horario</th>
                                <th>Días</th>
                                <th>Profesor</th>
                                <th class="text-center" style="width: 150px;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center">
                                    <span class="badge bg-secondary"><?php echo e($dato->id); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-primary"><?php echo e($dato->codigo_curso); ?></span>
                                </td>
                                <td>
                                    <div class="fw-bold"><?php echo e($dato->nombre_curso); ?></div>
                                    <small class="text-muted"><?php echo e($dato->descripcion ?: 'Sin descripción'); ?></small>
                                </td>
                                <td>
                                    <?php if($dato->descripcion): ?>
                                        <span class="text-truncate d-inline-block" style="max-width: 150px;" title="<?php echo e($dato->descripcion); ?>">
                                            <?php echo e($dato->descripcion); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="text-muted">Sin descripción</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-info"><?php echo e($dato->capacidad_maxima); ?> estudiantes</span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark"><?php echo e($dato->aula); ?></span>
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="fas fa-clock me-1"></i><?php echo e($dato->hora_inicio); ?>

                                    </div>
                                    <div class="small">
                                        <i class="fas fa-clock me-1"></i><?php echo e($dato->hora_fin); ?>

                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success"><?php echo e($dato->dias_clase); ?></span>
                                </td>
                                <td>
                                    <?php if($dato->usuario): ?>
                                        <div class="d-flex align-items-center">
                                            <img src="<?php echo e($dato->usuario->imgprofile); ?>" alt="Profesor" 
                                                 class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;"
                                                 onerror="this.src='<?php echo e(asset('img/default-avatar.png')); ?>'">
                                            <span><?php echo e($dato->usuario->nombre_apellido); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">
                                            <i class="fas fa-exclamation-triangle me-1"></i>Sin asignar
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('cursos.show', $dato->id)); ?>" 
                                           class="btn btn-outline-info btn-sm" 
                                           title="Ver detalles">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="<?php echo e(route('cursos.edit', $dato->id)); ?>" 
                                           class="btn btn-outline-warning btn-sm" 
                                           title="Editar curso">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form class="d-inline deleteForm" 
                                              action="<?php echo e(route('cursos.destroy', $dato->id)); ?>" 
                                              method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" 
                                                    class="btn btn-outline-danger btn-sm" 
                                                    onclick="return confirm('¿Estás seguro de eliminar este curso?')"
                                                    title="Eliminar curso">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Mostrando <?php echo e($datos->firstItem() ?? 0); ?> a <?php echo e($datos->lastItem() ?? 0); ?> 
                        de <?php echo e($datos->total()); ?> cursos
                    </div>
                    <div>
                        <?php echo e($datos->links()); ?>

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

.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.badge {
    font-size: 0.75rem;
    padding: 0.5em 0.75em;
}

.text-truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
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
                <title>Reporte de Cursos</title>
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
                    <h2 class="text-center mb-4">Reporte de Cursos - Colegio 10 de Agosto</h2>
                    ${contenido}
                </div>
            </body>
        </html>
    `);
    ventana.document.close();
    ventana.print();
}
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/cursos/index.blade.php ENDPATH**/ ?>