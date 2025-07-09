<?php $__env->startSection('title', 'REGISTRAR ASISTENCIA'); ?>

<?php $__env->startSection('content'); ?>
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>REGISTRAR NUEVA ASISTENCIA</h1>
<img class="logo_banner" src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="border-radius: 100%;">
</center>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-clipboard-check"></i> Formulario de Asistencia</h4>
                </div>
                <div class="card-body">
                    <?php if(session('error')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('asistencias.store')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_estudiante">
                                        <i class="fas fa-user-graduate"></i> Estudiante *
                                    </label>
                                    <select name="id_estudiante" id="id_estudiante" class="form-control" required>
                                        <option value="">Seleccione un estudiante</option>
                                        <?php $__currentLoopData = $estudiantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estudiante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($estudiante->id); ?>">
                                                <?php echo e($estudiante->nombres); ?> <?php echo e($estudiante->apellidos); ?> - <?php echo e($estudiante->cedula); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_curso">
                                        <i class="fas fa-book"></i> Curso *
                                    </label>
                                    <select name="id_curso" id="id_curso" class="form-control" required>
                                        <option value="">Seleccione un curso</option>
                                        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($curso->id); ?>">
                                                <?php echo e($curso->nombre_curso); ?> - <?php echo e($curso->codigo_curso); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">
                                        <i class="fas fa-calendar"></i> Fecha *
                                    </label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" 
                                           value="<?php echo e(date('Y-m-d')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_entrada">
                                        <i class="fas fa-clock"></i> Hora de Entrada
                                    </label>
                                    <input type="time" name="hora_entrada" id="hora_entrada" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_salida">
                                        <i class="fas fa-clock"></i> Hora de Salida
                                    </label>
                                    <input type="time" name="hora_salida" id="hora_salida" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">
                                        <i class="fas fa-check-circle"></i> Estado *
                                    </label>
                                    <select name="estado" id="estado" class="form-control" required>
                                        <option value="">Seleccione el estado</option>
                                        <option value="Presente">Presente</option>
                                        <option value="Ausente">Ausente</option>
                                        <option value="Tardanza">Tardanza</option>
                                        <option value="Justificado">Justificado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="justificacion">
                                        <i class="fas fa-file-alt"></i> Justificación
                                    </label>
                                    <textarea name="justificacion" id="justificacion" class="form-control" 
                                              rows="3" placeholder="Descripción de la justificación (opcional)"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> REGISTRAR ASISTENCIA
                            </button>
                            <a href="<?php echo e(route('asistencias.index')); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> CANCELAR
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/asistencias/create.blade.php ENDPATH**/ ?>