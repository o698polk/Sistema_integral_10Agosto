<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->


<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
<?php $__env->startSection('title', 'PRODUCTOS'); ?>

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
<?php $__env->startSection('content'); ?>
<div class="containe  page_style ">
<br>  <br>  <br>  <br>
<center>
<h1>PRODUCTOS</h1>
<img class="logo_banner"src="img/donuuts.ico" alt="Image 2">
</center>
</div>
<br>
<form method="POST"  action="<?php echo e(route('buscarproducto')); ?>" >
    <?php echo csrf_field(); ?>
    <div class="form-group">

        <input type="text" name="filtro_nombre" placeholder="Nombre" class="form-control" >
    </div>
    <?php if(session('user')->roles=='Administrador' ): ?>
    <!-- Agrega más campos de filtro según tus necesidades -->
    <button type="submit" class="btn btn-info">Buscar</button>
</form>

<a href="<?php echo e(route('product.create')); ?> " class="btn btn-primary">Añadir Producto</a>

<button onclick="imprimirDiv()" class="btn btn-success">Imprimir</button>

<div class="container scrollable-div"id="reportid">
<table class="table boder_bar btn_modulos">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Stock</th>
      <th>Imagen</th>
      <th>Precio</th>
      <th>Fecha</th>
      <th>Editar</th>
     <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <tr>
      <td><?php echo e($dato['id']); ?></td>
      <td><?php echo e($dato['nameproduct']); ?></td>
      <td><?php echo e($dato['description']); ?></td>
      <td><?php echo e($dato['stock']); ?></td>
    
      <td> <img src="<?php echo e($dato['imgproduct']); ?>" alt="avatar"
              class="rounded-circle img-fluid  logo_banner" ></td>
      <td><?php echo e($dato['price']); ?></td>
      <td><?php echo e($dato['created_at']); ?></td>
     
      <td><a  class="btn btn-primary" href="<?php echo e(route('product.edit',$dato['id'])); ?>">Editar</a></td>

      <td>
        <form class="deleteForm" action="<?php echo e(route('product.destroy',$dato['id'])); ?>" id_eliminar="<?php echo e($dato['id']); ?>"method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
     </td>
    </tr>
   
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php echo e($datos->links()); ?>

</div>

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Sistema_de_Ventas_Laravel\resources\views/product/index.blade.php ENDPATH**/ ?>