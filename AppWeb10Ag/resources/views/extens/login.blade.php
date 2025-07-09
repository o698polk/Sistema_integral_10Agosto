<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'INICIAR SESIÓN - COLEGIO 10 DE AGOSTO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<style>
    .login-container {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ffffff 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .login-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 450px;
        width: 100%;
        padding: 40px;
    }
    
    .school-logo {
        width: 120px;
        height: 120px;
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 30px;
        box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
    }
    
    .school-logo i {
        font-size: 50px;
        color: white;
    }
    
    .school-title {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .school-title h1 {
        color: #ff6b35;
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 5px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .school-title h2 {
        color: #f7931e;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .school-title p {
        color: #666;
        font-size: 14px;
        margin: 0;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-group label {
        color: #333;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 15px 20px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }
    
    .form-control:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
        outline: none;
    }
    
    .btn-login {
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border: none;
        border-radius: 12px;
        padding: 15px 30px;
        font-size: 18px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        background: linear-gradient(45deg, #f7931e, #ff6b35);
    }
    
    .alert {
        border-radius: 12px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 25px;
    }
    
    .alert-danger {
        background: linear-gradient(45deg, #ff6b35, #ff4757);
        color: white;
    }
    
    .system-info {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e9ecef;
    }
    
    .system-info h3 {
        color: #ff6b35;
        font-size: 16px;
        margin-bottom: 5px;
    }
    
    .system-info p {
        color: #666;
        font-size: 12px;
        margin: 0;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="school-logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
        </div>
        
        <div class="school-title">
            <h1>COLEGIO "10 DE AGOSTO"</h1>
            <h2>Sistema de Asistencia Virtual</h2>
            <p>Cantón San Lorenzo - Esmeraldas</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="correo">
                    <i class="fas fa-envelope"></i> Correo Electrónico
                </label>
                <input type="email" id="correo" name="correo" class="form-control" 
                       placeholder="Ingrese su correo electrónico" required autofocus>
            </div>

            <div class="form-group">
                <label for="clave">
                    <i class="fas fa-lock"></i> Contraseña
                </label>
                <input type="password" id="clave" name="clave" class="form-control" 
                       placeholder="Ingrese su contraseña" required>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> INICIAR SESIÓN
            </button>
        </form>

        <div class="system-info">
            <h3>Sistema de Gestión Educativa</h3>
            <p>Control de Asistencia • Gestión de Estudiantes • Reportes Académicos</p>
        </div>
    </div>
</div>
@endsection
