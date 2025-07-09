

<?php $__env->startSection('title', 'DETALLES DEL ESTUDIANTE'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Header con gradiente -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="bg-gradient-primary text-white p-4 rounded-3 shadow">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="display-5 fw-bold mb-2">
                            <i class="fas fa-user-graduate me-3"></i>
                            DETALLES DEL ESTUDIANTE
                        </h1>
                        <p class="text-white fs-5 mb-4">Información completa del estudiante seleccionado</p>
                        <img class="logo-banner" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="<?php echo e(route('estudiantes.index')); ?>" class="btn btn-light btn-lg me-2">
                            <i class="fas fa-arrow-left me-2"></i>
                            Volver
                        </a>
                        <a href="<?php echo e(route('estudiantes.edit', $dato->id)); ?>" class="btn btn-warning btn-lg">
                            <i class="fas fa-edit me-2"></i>
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información del Estudiante -->
    <div class="row">
        <!-- Foto y información básica -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <?php if($dato->foto): ?>
                        <img src="<?php echo e(asset($dato->foto)); ?>" alt="Foto del estudiante" 
                             class="img-fluid rounded-circle mb-3" 
                             style="width: 200px; height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                             style="width: 200px; height: 200px;">
                            <i class="fas fa-user fa-4x text-muted"></i>
                        </div>
                    <?php endif; ?>
                    
                    <h4 class="card-title text-primary"><?php echo e($dato->nombres); ?> <?php echo e($dato->apellidos); ?></h4>
                    <p class="text-muted mb-2">
                        <i class="fas fa-id-badge me-2"></i>
                        <strong>Código:</strong> <?php echo e($dato->codigo_estudiante); ?>

                    </p>
                    <p class="text-muted mb-2">
                        <i class="fas fa-id-card me-2"></i>
                        <strong>Cédula:</strong> <?php echo e($dato->cedula); ?>

                    </p>
                    
                    <?php if($dato->genero == 'Masculino'): ?>
                        <span class="badge bg-info fs-6">
                            <i class="fas fa-male me-1"></i>Masculino
                        </span>
                    <?php else: ?>
                        <span class="badge bg-warning fs-6">
                            <i class="fas fa-female me-1"></i>Femenino
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Información detallada -->
        <div class="col-md-8">
            <div class="row">
                <!-- Información Personal -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-user me-2"></i>Información Personal
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-calendar me-2"></i>Fecha de Nacimiento
                                </label>
                                <p class="mb-0"><?php echo e($dato->fecha_nacimiento ? \Carbon\Carbon::parse($dato->fecha_nacimiento)->format('d/m/Y') : 'No registrada'); ?></p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-map-marker-alt me-2"></i>Dirección
                                </label>
                                <p class="mb-0"><?php echo e($dato->direccion ?? 'No registrada'); ?></p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-phone me-2"></i>Teléfono
                                </label>
                                <p class="mb-0"><?php echo e($dato->telefono ?? 'No registrado'); ?></p>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <p class="mb-0"><?php echo e($dato->email ?? 'No registrado'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información de Padres -->
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-success text-white">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-users me-2"></i>Información de Padres
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-male me-2"></i>Padre
                                </label>
                                <p class="mb-0"><?php echo e($dato->nombre_padre ?? 'No registrado'); ?></p>
                                <?php if($dato->telefono_padre): ?>
                                    <small class="text-muted">
                                        <i class="fas fa-phone me-1"></i><?php echo e($dato->telefono_padre); ?>

                                    </small>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-female me-2"></i>Madre
                                </label>
                                <p class="mb-0"><?php echo e($dato->nombre_madre ?? 'No registrada'); ?></p>
                                <?php if($dato->telefono_madre): ?>
                                    <small class="text-muted">
                                        <i class="fas fa-phone me-1"></i><?php echo e($dato->telefono_madre); ?>

                                    </small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información del Sistema -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h6 class="card-title mb-0">
                                <i class="fas fa-cogs me-2"></i>Información del Sistema
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted">
                                            <i class="fas fa-calendar-plus me-2"></i>Fecha de Registro
                                        </label>
                                        <p class="mb-0"><?php echo e($dato->created_at ? \Carbon\Carbon::parse($dato->created_at)->format('d/m/Y H:i') : 'No disponible'); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label text-muted">
                                            <i class="fas fa-calendar-check me-2"></i>Última Actualización
                                        </label>
                                        <p class="mb-0"><?php echo e($dato->updated_at ? \Carbon\Carbon::parse($dato->updated_at)->format('d/m/Y H:i') : 'No disponible'); ?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <?php if($dato->usuario): ?>
                            <div class="mb-3">
                                <label class="form-label text-muted">
                                    <i class="fas fa-user-cog me-2"></i>Registrado por
                                </label>
                                <p class="mb-0"><?php echo e($dato->usuario->nombre_apellido ?? 'Usuario no encontrado'); ?></p>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="<?php echo e(route('estudiantes.edit', $dato->id)); ?>" class="btn btn-warning btn-lg me-3">
                <i class="fas fa-edit me-2"></i>Editar Estudiante
            </a>
            <a href="<?php echo e(route('estudiantes.index')); ?>" class="btn btn-secondary btn-lg me-3">
                <i class="fas fa-list me-2"></i>Ver Todos
            </a>
            <form action="<?php echo e(route('estudiantes.destroy', $dato->id)); ?>" method="POST" class="d-inline delete-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-lg" 
                        onclick="return confirm('¿Estás seguro de eliminar este estudiante? Esta acción no se puede deshacer.')">
                    <i class="fas fa-trash me-2"></i>Eliminar
                </button>
            </form>
        </div>
    </div>
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

.card-header {
    border-bottom: none;
}

.bg-primary {
    background: linear-gradient(45deg, #667eea, #764ba2) !important;
}

.bg-success {
    background: linear-gradient(45deg, #28a745, #20c997) !important;
}

.bg-info {
    background: linear-gradient(45deg, #17a2b8, #6f42c1) !important;
}

.btn-warning {
    background: linear-gradient(45deg, #ffc107, #fd7e14);
    border: none;
}

.btn-warning:hover {
    background: linear-gradient(45deg, #fd7e14, #ffc107);
    transform: translateY(-1px);
}

.btn-danger {
    background: linear-gradient(45deg, #dc3545, #e83e8c);
    border: none;
}

.btn-danger:hover {
    background: linear-gradient(45deg, #e83e8c, #dc3545);
    transform: translateY(-1px);
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/estudiantes/show.blade.php ENDPATH**/ ?>