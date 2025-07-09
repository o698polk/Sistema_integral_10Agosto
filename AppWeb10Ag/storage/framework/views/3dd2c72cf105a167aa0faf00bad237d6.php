

<?php $__env->startSection('title', 'ASISTENCIAS'); ?>

<?php $__env->startSection('content'); ?>
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>GESTIÓN DE ASISTENCIAS</h1>
<img class="logo_banner" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<!-- Formulario de búsqueda -->
<form method="POST" action="<?php echo e(route('asistencias.buscar')); ?>">
    <?php echo csrf_field(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="filtro_estudiante" placeholder="Buscar por estudiante" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="filtro_curso" placeholder="Buscar por curso" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input type="date" name="filtro_fecha" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-info">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>
        </div>
    </div>
</form>

<br>

<!-- Botones de acción -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php echo e(route('asistencias.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus"></i> Registrar Asistencia
            </a>
            <a href="<?php echo e(route('asistencias.registrar-masiva')); ?>" class="btn btn-warning">
                <i class="fas fa-users"></i> Asistencia Masiva
            </a>
            <button onclick="imprimirDiv()" class="btn btn-success">
                <i class="fas fa-print"></i> Imprimir
            </button>
        </div>
    </div>
</div>

<br>

<!-- Tabla de asistencias -->
<div class="container scrollable-div" id="reportid">
    <?php if(session('error')): ?>
        <div class="alert alert-info">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <table class="table boder_bar btn_modulos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Hora Entrada</th>
                <th>Hora Salida</th>
                <th>Estado</th>
                <th>Justificación</th>
                <th>Registrado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($dato->id); ?></td>
                <td>
                    <?php if($dato->estudiante): ?>
                        <?php echo e($dato->estudiante->nombres); ?> <?php echo e($dato->estudiante->apellidos); ?>

                    <?php else: ?>
                        <span class="text-muted">Estudiante no encontrado</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($dato->curso): ?>
                        <?php echo e($dato->curso->nombre_curso); ?>

                    <?php else: ?>
                        <span class="text-muted">Curso no encontrado</span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($dato->fecha); ?></td>
                <td><?php echo e($dato->hora_entrada ?? 'No registrada'); ?></td>
                <td><?php echo e($dato->hora_salida ?? 'No registrada'); ?></td>
                <td>
                    <?php if($dato->estado == 'Presente'): ?>
                        <span class="badge bg-success"><?php echo e($dato->estado); ?></span>
                    <?php elseif($dato->estado == 'Ausente'): ?>
                        <span class="badge bg-danger"><?php echo e($dato->estado); ?></span>
                    <?php elseif($dato->estado == 'Tardanza'): ?>
                        <span class="badge bg-warning"><?php echo e($dato->estado); ?></span>
                    <?php elseif($dato->estado == 'Justificado'): ?>
                        <span class="badge bg-info"><?php echo e($dato->estado); ?></span>
                    <?php else: ?>
                        <span class="badge bg-secondary"><?php echo e($dato->estado ?? 'No definido'); ?></span>
                    <?php endif; ?>
                </td>
                <td><?php echo e($dato->justificacion ?? 'Sin justificación'); ?></td>
                <td>
                    <?php if($dato->usuario): ?>
                        <?php echo e($dato->usuario->nombre_apellido); ?>

                    <?php else: ?>
                        <span class="text-muted">Usuario no encontrado</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary btn-sm" href="<?php echo e(route('asistencias.show', $dato->id)); ?>">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="<?php echo e(route('asistencias.edit', $dato->id)); ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form class="deleteForm d-inline" action="<?php echo e(route('asistencias.destroy', $dato->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta asistencia?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    
    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        <?php echo e($datos->links()); ?>

    </div>
</div>

<!-- Estadísticas rápidas -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Presentes</h5>
                    <p class="card-text"><?php echo e($datos->where('estado', 'Presente')->count()); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Ausentes</h5>
                    <p class="card-text"><?php echo e($datos->where('estado', 'Ausente')->count()); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Tardanzas</h5>
                    <p class="card-text"><?php echo e($datos->where('estado', 'Tardanza')->count()); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Justificados</h5>
                    <p class="card-text"><?php echo e($datos->where('estado', 'Justificado')->count()); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/asistencias/index.blade.php ENDPATH**/ ?>