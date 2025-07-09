<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->


<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
<?php $__env->startSection('title', 'SISTEMA DE ASISTENCIA - COLEGIO 10 DE AGOSTO'); ?>

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
<?php $__env->startSection('content'); ?>

<style>
    .hero-section {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ffffff 100%);
        padding: 80px 0;
        color: white;
    }
    
    .hero-content h1 {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }
    
    .btn-hero {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid white;
        color: white;
        padding: 15px 30px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }
    
    .btn-hero:hover {
        background: white;
        color: #ff6b35;
        transform: translateY(-2px);
    }
    
    .stats-section {
        background: white;
        padding: 60px 0;
    }
    
    .stat-card {
        text-align: center;
        padding: 30px 20px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: white;
        margin-bottom: 30px;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 107, 53, 0.2);
    }
    
    .stat-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .stat-icon i {
        font-size: 35px;
        color: white;
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ff6b35;
        margin-bottom: 10px;
    }
    
    .stat-label {
        color: #666;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .features-section {
        background: #f8f9fa;
        padding: 80px 0;
    }
    
    .feature-card {
        background: white;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
        margin-bottom: 30px;
        border-left: 5px solid #ff6b35;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255, 107, 53, 0.2);
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
    }
    
    .feature-icon i {
        font-size: 30px;
        color: white;
    }
    
    .feature-title {
        color: #333;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .feature-description {
        color: #666;
        line-height: 1.6;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-title h2 {
        color: #ff6b35;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 15px;
    }
    
    .section-title p {
        color: #666;
        font-size: 1.1rem;
    }
</style>

<!-- ======= Hero Section ======= -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1>Sistema de Asistencia Virtual</h1>
                    <h2>COLEGIO "10 DE AGOSTO"</h2>
                    <p>Gestión integral de asistencia estudiantil para el cantón San Lorenzo, Esmeraldas. Control eficiente, reportes detallados y seguimiento académico en tiempo real.</p>
                    <div class="d-flex gap-3">
                        <a href="/login" class="btn-hero">
                            <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </a>
                        <a href="/register" class="btn-hero">
                            <i class="fas fa-user-plus"></i> Registrarse
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <i class="fas fa-graduation-cap" style="font-size: 200px; color: rgba(255,255,255,0.3);"></i>
            </div>
        </div>
    </div>
</section>

<!-- ======= Stats Section ======= -->
<section class="stats-section">
    <div class="container">
        <div class="section-title">
            <h2>Estadísticas del Sistema</h2>
            <p>Control y seguimiento educativo en tiempo real</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number"><?php echo e($datos['estudiantes'] ?? 0); ?></div>
                    <div class="stat-label">Estudiantes Registrados</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="stat-number"><?php echo e($datos['usuarios'] ?? 0); ?></div>
                    <div class="stat-label">Usuarios Registrados</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="stat-number"><?php echo e($datos['cursos'] ?? 0); ?></div>
                    <div class="stat-label">Cursos Disponibles</div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="stat-number"><?php echo e($datos['asistencias'] ?? 0); ?></div>
                    <div class="stat-label">Asistencias Registradas</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= Features Section ======= -->
<section class="features-section">
    <div class="container">
        <div class="section-title">
            <h2>Características del Sistema</h2>
            <p>Herramientas avanzadas para la gestión educativa</p>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h3 class="feature-title">Control de Asistencia</h3>
                    <p class="feature-description">Registro automático de asistencia con opciones de justificación y seguimiento detallado de cada estudiante.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <h3 class="feature-title">Reportes Académicos</h3>
                    <p class="feature-description">Generación de reportes detallados de asistencia, estadísticas por curso y análisis de rendimiento estudiantil.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                    <h3 class="feature-title">Notificaciones</h3>
                    <p class="feature-description">Sistema de alertas automáticas para ausencias, tardanzas y comunicaciones importantes con padres y estudiantes.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">Acceso Móvil</h3>
                    <p class="feature-description">Interfaz responsive que permite el acceso desde cualquier dispositivo móvil para mayor comodidad.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">Seguridad</h3>
                    <p class="feature-description">Sistema de autenticación seguro con roles diferenciados para administradores, profesores y estudiantes.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    <h3 class="feature-title">Respaldo de Datos</h3>
                    <p class="feature-description">Respaldo automático de toda la información del sistema para garantizar la integridad de los datos académicos.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Isate_proyect\Proyectos_practicas_studiantes\Sistema_asistencia\resources\views/extens/home.blade.php ENDPATH**/ ?>