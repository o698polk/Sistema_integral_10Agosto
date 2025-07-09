

<?php $__env->startSection('title', 'ASISTENCIA MASIVA'); ?>

<?php $__env->startSection('content'); ?>
<div class="containe page_style">
  <br><br><br><br>
<center>
<h1>REGISTRAR ASISTENCIA MASIVA</h1>
<img class="logo_banner" src="img/logo-colegio.png" alt="Logo Colegio">
</center>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-users"></i> Asistencia Masiva por Curso</h4>
                </div>
                <div class="card-body">
                    <?php if(session('error')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session('error')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('registrar-asistencia-masiva')); ?>" id="asistenciaMasivaForm">
                        <?php echo csrf_field(); ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="curso_id">
                                        <i class="fas fa-book"></i> Seleccionar Curso *
                                    </label>
                                    <select name="curso_id" id="curso_id" class="form-control" required>
                                        <option value="">Seleccione un curso</option>
                                        <?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($curso->id); ?>">
                                                <?php echo e($curso->nombre_curso); ?> - <?php echo e($curso->grado); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha">
                                        <i class="fas fa-calendar"></i> Fecha *
                                    </label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" 
                                           value="<?php echo e(date('Y-m-d')); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-info" onclick="cargarEstudiantes()">
                                    <i class="fas fa-search"></i> CARGAR ESTUDIANTES
                                </button>
                            </div>
                        </div>

                        <div id="estudiantes-container" class="mt-4" style="display: none;">
                            <h5><i class="fas fa-list"></i> Lista de Estudiantes</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Estudiante</th>
                                            <th>Cédula</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="estudiantes-tbody">
                                        <!-- Los estudiantes se cargarán aquí dinámicamente -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-success" onclick="marcarTodos('Presente')">
                                        <i class="fas fa-check"></i> Marcar Todos Presentes
                                    </button>
                                    <button type="button" class="btn btn-danger" onclick="marcarTodos('Ausente')">
                                        <i class="fas fa-times"></i> Marcar Todos Ausentes
                                    </button>
                                    <button type="button" class="btn btn-warning" onclick="marcarTodos('Tardanza')">
                                        <i class="fas fa-clock"></i> Marcar Todos Tardanza
                                    </button>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> REGISTRAR ASISTENCIAS
                                </button>
                                <a href="<?php echo e(route('asistencias.index')); ?>" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> CANCELAR
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function cargarEstudiantes() {
    const cursoId = document.getElementById('curso_id').value;
    const fecha = document.getElementById('fecha').value;
    
    if (!cursoId) {
        alert('Por favor seleccione un curso');
        return;
    }
    
    if (!fecha) {
        alert('Por favor seleccione una fecha');
        return;
    }

    // Simular carga de estudiantes (en un caso real, harías una petición AJAX)
    // Por ahora, mostraremos un mensaje de ejemplo
    const tbody = document.getElementById('estudiantes-tbody');
    tbody.innerHTML = `
        <tr>
            <td>Juan Pérez</td>
            <td>1234567890</td>
            <td>
                <select name="asistencias[1]" class="form-control">
                    <option value="Presente">Presente</option>
                    <option value="Ausente">Ausente</option>
                    <option value="Tardanza">Tardanza</option>
                    <option value="Justificado">Justificado</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>María García</td>
            <td>0987654321</td>
            <td>
                <select name="asistencias[2]" class="form-control">
                    <option value="Presente">Presente</option>
                    <option value="Ausente">Ausente</option>
                    <option value="Tardanza">Tardanza</option>
                    <option value="Justificado">Justificado</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Carlos López</td>
            <td>1122334455</td>
            <td>
                <select name="asistencias[3]" class="form-control">
                    <option value="Presente">Presente</option>
                    <option value="Ausente">Ausente</option>
                    <option value="Tardanza">Tardanza</option>
                    <option value="Justificado">Justificado</option>
                </select>
            </td>
        </tr>
    `;
    
    document.getElementById('estudiantes-container').style.display = 'block';
}

function marcarTodos(estado) {
    const selects = document.querySelectorAll('select[name^="asistencias"]');
    selects.forEach(select => {
        select.value = estado;
    });
}
</script>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/asistencias/registrar-masiva.blade.php ENDPATH**/ ?>