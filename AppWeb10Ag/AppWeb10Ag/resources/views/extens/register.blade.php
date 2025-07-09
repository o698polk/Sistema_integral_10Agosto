<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'REGISTRO - COLEGIO 10 DE AGOSTO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<style>
    .register-container {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ffffff 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .register-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 500px;
        width: 100%;
        padding: 40px;
    }
    
    .school-logo {
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
    }
    
    .school-logo i {
        font-size: 40px;
        color: white;
    }
    
    .school-title {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .school-title h1 {
        color: #ff6b35;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .school-title h2 {
        color: #f7931e;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .school-title p {
        color: #666;
        font-size: 12px;
        margin: 0;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        color: #333;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        font-size: 14px;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.9);
    }
    
    .form-control:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
        outline: none;
    }
    
    .btn-register {
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border: none;
        border-radius: 10px;
        padding: 12px 25px;
        font-size: 16px;
        font-weight: 600;
        color: white;
        width: 100%;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
    }
    
    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        background: linear-gradient(45deg, #f7931e, #ff6b35);
    }
    
    .alert {
        border-radius: 10px;
        border: none;
        padding: 12px 15px;
        margin-bottom: 20px;
        font-size: 14px;
    }
    
    .alert-danger {
        background: linear-gradient(45deg, #ff6b35, #ff4757);
        color: white;
    }
    
    .login-link {
        text-align: center;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e9ecef;
    }
    
    .login-link a {
        color: #ff6b35;
        text-decoration: none;
        font-weight: 600;
    }
    
    .login-link a:hover {
        color: #f7931e;
    }
</style>

<div class="register-container">
    <div class="register-card">
        <div class="school-logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 60px; height: 60px; filter: brightness(0) invert(1); border-radius: 100%;">
        </div>
        
        <div class="school-title">
            <h1>COLEGIO "10 DE AGOSTO"</h1>
            <h2>Registro de Usuario</h2>
            <p>Sistema de Asistencia Virtual</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/registrar_usuario">
            @csrf
            <div class="form-group">
                <label for="nombre_apellido">
                    <i class="fas fa-user"></i> Nombres y Apellidos
                </label>
                <input type="text" name="nombre_apellido" id="nombre_apellido" 
                       class="form-control" placeholder="Ingrese nombres y apellidos" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="usuario">
                    <i class="fas fa-user-circle"></i> Nombre de Usuario
                </label>
                <input type="text" name="usuario" id="usuario" 
                       class="form-control" placeholder="Ingrese nombre de usuario">
            </div>
            
            <div class="form-group">
                <label for="correo">
                    <i class="fas fa-envelope"></i> Correo Electrónico
                </label>
                <input type="email" id="correo" name="correo" 
                       class="form-control" placeholder="Ingrese su correo electrónico" required>
            </div>

            <div class="form-group">
                <label for="clave">
                    <i class="fas fa-lock"></i> Contraseña
                </label>
                <input type="password" id="clave" name="clave" 
                       class="form-control" placeholder="Ingrese su contraseña" required>
            </div>

            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus"></i> REGISTRAR USUARIO
            </button>
        </form>

        <div class="login-link">
            <p>¿Ya tienes una cuenta? <a href="/login">Iniciar Sesión</a></p>
        </div>
    </div>
</div>
@endsection
