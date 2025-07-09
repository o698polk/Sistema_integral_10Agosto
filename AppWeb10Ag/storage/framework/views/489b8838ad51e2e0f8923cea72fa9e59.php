<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->


<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
<?php $__env->startSection('title', 'LOGIN'); ?>

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
<?php $__env->startSection('content'); ?>
<div class="containe  page_style">
<br><br><br><br>
<center>

<img class="logo_banner"src="img/donuuts.ico" alt="Image 2">
</center>
<div class="container">

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>
                        <h1>LOGIN</h1>
                        <form method="POST" action="/login">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="correo">Email</label>
                                <input type="email" id="correo" name="correo" class="form-control" required autofocus>
                            </div>

                            <div class="form-group">
                                <label for="clave">Password</label>
                                <input type="password" id="clave" name="clave" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Sistema_de_Ventas_Laravel\resources\views/extens/login.blade.php ENDPATH**/ ?>