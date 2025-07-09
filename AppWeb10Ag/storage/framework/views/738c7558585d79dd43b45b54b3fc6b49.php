<html>
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="description" content="Sistema de Asistencia Virtual - Colegio 10 de Agosto">
    <meta name="author" content="Colegio 10 de Agosto">

    <title><?php echo $__env->yieldContent('title'); ?> - Colegio 10 de Agosto</title>
    <meta content="Sistema de asistencia virtual para el control de presencia estudiantil" name="description">
  <meta content="asistencia, virtual, colegio, educación, estudiantes" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo e(asset('img/logo.png')); ?>" rel="icon">
  <link href="<?php echo e(asset('img/logo.png')); ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/aos/aos.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
  <link rel="stylesheet" href="ruta-a/font-awesome/css/all.min.css">
 
  <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">

  
</head>

    <body>
    <style>
    /* Estilos personalizados para el sistema de asistencia */
    :root {
      --primary-red: #dc3545;
      --primary-orange: #fd7e14;
      --primary-white: #ffffff;
      --secondary-red: #c82333;
      --secondary-orange: #e55a00;
    }

    .header {
      background: linear-gradient(135deg, var(--primary-red) 0%, var(--primary-orange) 100%);
    }

    .logo h1 {
      color: var(--primary-white) !important;
      font-weight: 700;
    }

    .navbar ul li a {
      color: var(--primary-white) !important;
      font-weight: 500;
    }

    .navbar ul li a:hover {
      color: #f8f9fa !important;
      background-color: rgba(255, 255, 255, 0.1);
    }

    .btn-primary {
      background-color: var(--primary-red);
      border-color: var(--primary-red);
    }

    .btn-primary:hover {
      background-color: var(--secondary-red);
      border-color: var(--secondary-red);
    }

    .btn-warning {
      background-color: var(--primary-orange);
      border-color: var(--primary-orange);
      color: var(--primary-white);
    }

    .btn-warning:hover {
      background-color: var(--secondary-orange);
      border-color: var(--secondary-orange);
      color: var(--primary-white);
    }

    .section-header h2 {
      color: var(--primary-red);
    }

    .section-header span {
      color: var(--primary-orange);
    }

    .footer {
      background: linear-gradient(135deg, var(--primary-red) 0%, var(--primary-orange) 100%);
      color: var(--primary-white);
    }

    .footer h4 {
      color: var(--primary-white);
    }

    .footer .icon {
      color: var(--primary-orange);
    }

    .social-links a {
      background-color: var(--primary-orange);
      color: var(--primary-white);
    }

    .social-links a:hover {
      background-color: var(--secondary-orange);
    }
  </style>


 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="<?php echo e(route('home')); ?>" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?php echo e(asset('img/logo.png')); ?>" alt="Logo Colegio" style="height: 40px; margin-right: 10px; border-radius: 100%;">
        <h1 style="font-family:'Times New Roman', serif">Colegio 10 de Agosto<span>.</span></h1>
      </a>

    <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo e(route('home')); ?>">INICIO</a></li>
          <?php if(!empty( session('user'))) {?>
          <li><a href="<?php echo e(route('dashboard')); ?>">PANEL</a></li>
          <li><a href="<?php echo e(route('estudiantes.index')); ?>">ESTUDIANTES</a></li>
          <li><a href="<?php echo e(route('cursos.index')); ?>">CURSOS</a></li>
          <li><a href="<?php echo e(route('asistencias.index')); ?>">ASISTENCIAS</a></li>
          <li><a href="<?php echo e(route('salir')); ?>">SALIR</a></li>
          <?php } else{  ?>
          <li><a href="<?php echo e(route('login')); ?>">INICIAR SESIÓN</a></li>
          <li><a href="<?php echo e(route('register')); ?>">REGISTRARSE</a></li>
          <?php }  ?>
          
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->



<style>
      .scrollable-div {
  max-height: 700px; /* Establece la altura máxima deseada */
  overflow-y: auto; /* Habilita la barra de desplazamiento vertical */
}
.logo_banner{
  width: 100px;
  height: 100px;
}

.btn_comprar{
  width:30%;
}
.witimg{
  width:200px;
  height: 200px;
}
.w-5{
    display:none;
}

/* Estilos adicionales para el sistema educativo */
.education-card {
  border-left: 4px solid var(--primary-red);
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
}

.education-icon {
  color: var(--primary-orange);
  font-size: 2rem;
}

.stats-counter {
  background: linear-gradient(135deg, var(--primary-red) 0%, var(--primary-orange) 100%);
  color: var(--primary-white);
}

</style>
  </section><!-- End Stats Counter Section -->


          
            <?php echo $__env->yieldContent('content'); ?>
       




    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Sobre Nosotros</h2>
          <p>Conoce más acerca <span>de nuestra institución</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" style="background-image: url(img/colegio.jpg) ;" data-aos="fade-up" data-aos-delay="150">
          <div class="call-us position-absolute">
          <br><br>
              <h4>Contáctanos</h4>
              <p>+593-0986288962</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
             <strong> Colegio "10 de Agosto": Formando Futuros Líderes en San Lorenzo</strong>
              </p>
             
              <p>
              El Colegio "10 de Agosto" es una institución educativa comprometida con la excelencia académica y la formación integral de nuestros estudiantes. Ubicados en San Lorenzo, Esmeraldas, nos dedicamos a proporcionar una educación de calidad que prepare a nuestros alumnos para los desafíos del futuro, fomentando valores como la responsabilidad, el respeto y la perseverancia.
              </p>

              <div class="position-relative mt-4">
                <img src="img/estudiantes.jpg" class="img-fluid" alt="Estudiantes del Colegio 10 de Agosto">
                <a href="https://www.youtube.com/watch?v=example" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->


 

 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-3">
    <div class="col-lg-3 col-md-6 d-flex">
      <i class="bi bi-geo-alt icon"></i>
      <div>
        <h4>Dirección</h4>
        <p>
        San Lorenzo, Esmeraldas<br>
        Ecuador
        </p>
      </div>

    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-telephone icon"></i>
      <div>
        <h4>Contacto</h4>
        <p>
          <strong>Teléfono:</strong> +593-0986288962<br>
          <strong>Email:</strong> info@colegio10deagosto.edu.ec<br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links d-flex">
      <i class="bi bi-clock icon"></i>
      <div>
        <h4>Horario de Clases</h4>
        <p>
          <strong>Lun-Vie: 7:00 AM</strong> - 13:00 PM<br>
          <strong>Sáb: 8:00 AM</strong> - 12:00 PM<br>
          <strong>Dom: Cerrado</strong><br>
        </p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 footer-links">
      <h4>Síguenos</h4>
      <div class="social-links d-flex">
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
      </div>
    </div>

  </div>
</div>

<div class="container mt-4">
  <div class="copyright">
    &copy; Copyright <strong><span>Colegio 10 de Agosto</span></strong>. Todos los derechos reservados
  </div>
</div>

</footer><!-- End Footer -->
<!-- End Footer -->



<!-- Vendor JS Files -->
<script src="<?php echo e(asset('../../../vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('../../../vendor/aos/aos.js ')); ?>"></script>
<script src="<?php echo e(asset('../../../vendor/glightbox/js/glightbox.min.js ')); ?>"></script>
<script src="<?php echo e(asset('../../../vendor/purecounter/purecounter_vanilla.js ')); ?>"></script>
<script src="<?php echo e(asset('../../../vendor/swiper/swiper-bundle.min.js ')); ?>"></script>
<script src="<?php echo e(asset('../../../vendor/php-email-form/validate.js ')); ?>"></script>

<script src="../../../js/main.js"></script>

      <script src="<?php echo e(asset('../../../js/jquery.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('../../../js/index.js')); ?>"></script>

<!-- Template Main JS File -->

    <!-- JAVASCRIPT FILES -->
   <!-- <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>-->
   
            <script>
            function confirmDelete(event) {
          /*  event.preventDefault();

            if (confirm('¿Estás seguro de que deseas eliminar este elemento?')) {

            document.getElementById(this).submit();
            }*/
            }
            </script>

<script>
    function imprimirDiv() {
       var contenidoDiv = document.getElementById("reportid").innerHTML;
       var ventanaImpresion = window.open('', '', 'width=800,height=600');
        ventanaImpresion.document.write('<html><head><title>Imprimir Div</title></head><body>');
      ventanaImpresion.document.write(contenidoDiv);
       ventanaImpresion.document.write('</body></html>');
       ventanaImpresion.document.close();
       ventanaImpresion.print();
     }
     /*
     Eliminar();
     function Eliminar() {
        $(document).on('submit', '.deleteForm', function(event) {
            event.preventDefault();
            let id = $(this).attr('id_eliminar'); // Encerrar el nombre del atributo en comillas

            if (confirm('¿Estás seguro de que deseas eliminar este elemento? id->' + id)) {
                this.submit();// Utilizar jQuery para enviar el formulario
            }
        });
    }
    */
  </script>

  
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Sistema_integral_10Agosto\AppWeb10Ag\AppWeb10Ag\resources\views/layouts/app.blade.php ENDPATH**/ ?>