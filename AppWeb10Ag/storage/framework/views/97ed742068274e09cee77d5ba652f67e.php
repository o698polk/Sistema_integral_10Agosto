

<?php $__env->startSection('title', 'GESTIÓN DE ESTUDIANTES'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid container">
    <!-- Header con gradiente -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-gradient-primary text-white p-4 rounded-3 shadow">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-2">
                            <i class="fas fa-user-graduate me-3"></i>
                            GESTIÓN DE ESTUDIANTES
                        </h1>
                        <p class="text-white fs-5 mb-4">Administra todos los estudiantes del sistema educativo</p>
                        <img class="logo-banner" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="<?php echo e(route('estudiantes.create')); ?>" class="btn btn-light btn-lg">
                            <i class="fas fa-plus-circle me-2"></i>
                            Nuevo Estudiante
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtros de búsqueda -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="GET" action="<?php echo e(route('estudiantes.buscar')); ?>" class="row g-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="filtro_nombre" name="filtro_nombre" 
                                       placeholder="Buscar por nombre" value="<?php echo e(request('filtro_nombre')); ?>">
                                <label for="filtro_nombre">
                                    <i class="fas fa-search me-2"></i>Buscar por nombre
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="filtro_cedula" name="filtro_cedula" 
                                       placeholder="Buscar por cédula" value="<?php echo e(request('filtro_cedula')); ?>">
                                <label for="filtro_cedula">
                                    <i class="fas fa-id-card me-2"></i>Buscar por cédula
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

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Total Estudiantes</h6>
                            <h3 class="mb-0"><?php echo e($datos->total()); ?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-users fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Activos</h6>
                            <h3 class="mb-0"><?php echo e($datos->where('estado', 'Activo')->count()); ?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-check-circle fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-info text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Hombres</h6>
                            <h3 class="mb-0"><?php echo e($datos->where('genero', 'Masculino')->count()); ?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-male fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-white shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="card-title">Mujeres</h6>
                            <h3 class="mb-0"><?php echo e($datos->where('genero', 'Femenino')->count()); ?></h3>
                        </div>
                        <div class="align-self-center">
                            <i class="fas fa-female fa-2x opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de estudiantes -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>Lista de Estudiantes
                    </h5>
                </div>
                <div class="card-body p-0">
                    <?php if(session('error')): ?>
                        <div class="alert alert-info m-3">
                            <i class="fas fa-info-circle me-2"></i><?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center" style="width: 60px;">
                                        <i class="fas fa-image"></i>
                                    </th>
                                    <th>Código</th>
                                    <th>Nombres</th>
                                    <th>Cédula</th>
                                    <th>Género</th>
                                    <th>Cursos</th>
                                    <th>Teléfono</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($estudiante->foto): ?>
                                            <img src="<?php echo e(asset($estudiante->foto)); ?>" 
                                                 alt="Foto" 
                                                 class="rounded-circle" 
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        <?php else: ?>
                                            <div class="bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary"><?php echo e($estudiante->codigo_estudiante); ?></span>
                                    </td>
                                    <td>
                                        <strong><?php echo e($estudiante->nombres); ?> <?php echo e($estudiante->apellidos); ?></strong>
                                    </td>
                                    <td><?php echo e($estudiante->cedula); ?></td>
                                    <td>
                                        <?php if($estudiante->genero == 'Masculino'): ?>
                                            <span class="badge bg-info">
                                                <i class="fas fa-male me-1"></i>Masculino
                                            </span>
                                        <?php else: ?>
                                            <span class="badge bg-warning">
                                                <i class="fas fa-female me-1"></i>Femenino
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($estudiante->cursos && $estudiante->cursos->count() > 0): ?>
                                            <div class="d-flex flex-wrap gap-1">
                                                <?php $__currentLoopData = $estudiante->cursos->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="badge bg-primary" title="<?php echo e($curso->nombre_curso); ?>">
                                                        <?php echo e($curso->codigo_curso); ?>

                                                    </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($estudiante->cursos->count() > 2): ?>
                                                    <span class="badge bg-secondary">
                                                        +<?php echo e($estudiante->cursos->count() - 2); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        <?php else: ?>
                                            <span class="text-muted small">Sin cursos</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($estudiante->telefono ?? 'No registrado'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('estudiantes.show', $estudiante->id)); ?>" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Ver detalles">
                                               <i class="bi bi-eye-fill"></i>
                                            </a>
                                            <a href="<?php echo e(route('estudiantes.edit', $estudiante->id)); ?>" 
                                               class="btn btn-sm btn-outline-warning" 
                                               title="Editar">
                                               <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="<?php echo e(route('estudiantes.destroy', $estudiante->id)); ?>" 
                                                  method="POST" 
                                                  class="d-inline delete-form">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        title="Eliminar"
                                                        onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                                        <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-users fa-3x mb-3"></i>
                                            <h5>No hay estudiantes registrados</h5>
                                            <p>Comienza agregando el primer estudiante al sistema.</p>
                                            <a href="<?php echo e(route('estudiantes.create')); ?>" class="btn btn-primary">
                                                <i class="fas fa-plus me-2"></i>Agregar Estudiante
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginación -->
    <?php if($datos->hasPages()): ?>
    <div class="row mt-4">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <?php echo e($datos->links()); ?>

            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card {
    border: none;
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
}

.table th {
    border-top: none;
    font-weight: 600;
    color: #495057;
}

.btn-group .btn {
    border-radius: 0.375rem !important;
}

.btn-group .btn:first-child {
    border-top-left-radius: 0.375rem !important;
    border-bottom-left-radius: 0.375rem !important;
}

.btn-group .btn:last-child {
    border-top-right-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}
</style>

<script>
// Confirmación para eliminar
document.addEventListener('DOMContentLoaded', function() {
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!confirm('¿Estás seguro de eliminar este estudiante? Esta acción no se puede deshacer.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/estudiantes/index.blade.php ENDPATH**/ ?>