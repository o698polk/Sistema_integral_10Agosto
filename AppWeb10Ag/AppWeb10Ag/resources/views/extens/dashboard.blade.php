<!-- DESPLEGANDO TODA LA PLATILLA REALIZADA--->
@extends('layouts.app')

<!-- DESPLEGANDO EL TITULO DE ESTA PAGINA-->
@section('title', 'DASHBOARD - COLEGIO 10 DE AGOSTO')

<!-- DESPLEGANDO TODO EL CONTENIDO DE ESTA PAGINA--->
@section('content')
<style>
    .dashboard-container {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ffffff 100%);
        min-height: 100vh;
        padding: 20px;
    }
    
    .dashboard-header {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
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
    
    .dashboard-title {
        color: #ff6b35;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 10px;
    }
    
    .dashboard-subtitle {
        color: #f7931e;
        font-size: 1.2rem;
        margin-bottom: 5px;
    }
    
    .dashboard-location {
        color: #666;
        font-size: 1rem;
    }
    
    .profile-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #ff6b35;
        margin: 0 auto 20px;
        display: block;
    }
    
    .profile-name {
        color: #333;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }
    
    .profile-role {
        color: #ff6b35;
        font-size: 1.1rem;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .profile-info {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }
    
    .info-item:last-child {
        border-bottom: none;
    }
    
    .info-label {
        color: #666;
        font-weight: 600;
    }
    
    .info-value {
        color: #333;
        font-weight: 500;
    }
    
    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 20px;
    }
    
    .btn-action {
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border: none;
        border-radius: 10px;
        padding: 12px 25px;
        color: white;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
    }
    
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .admin-section {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .admin-title {
        color: #ff6b35;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .admin-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .admin-link {
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        color: white;
        padding: 20px;
        border-radius: 15px;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
    }
    
    .admin-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .admin-link i {
        font-size: 2rem;
        margin-bottom: 10px;
        display: block;
    }
    
    .edit-form {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .form-title {
        color: #ff6b35;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 25px;
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-group label {
        color: #333;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
        outline: none;
    }
    
    .btn-edit {
        background: linear-gradient(45deg, #ff6b35, #f7931e);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
    }
    
    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
    }
    
    .alert {
        border-radius: 10px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 20px;
    }
    
    .alert-danger {
        background: linear-gradient(45deg, #ff6b35, #ff4757);
        color: white;
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <div class="school-logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Colegio" style="width: 80px; height: 80px; filter: brightness(0) invert(1); border-radius: 100%;">
        </div>
        <h1 class="dashboard-title">COLEGIO "10 DE AGOSTO"</h1>
        <h2 class="dashboard-subtitle">Sistema de Asistencia Virtual</h2>
        <p class="dashboard-location">Cantón San Lorenzo - Esmeraldas</p>
    </div>
<style>
.square-button {
  display: inline-block;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  color: #000000;
  background-color: white;
  border: 1px solid #000000;
  border-radius: 0;
  cursor: pointer;
}
</style>

<div class="container">
  <div class="row">

    <?php  $user = session('user'); ?>

    <div class="row">
      <div class="col-lg-4">
            <div class="profile-card">
                <img src="{{$user->imgprofile ?? 'img/default-avatar.png'}}" alt="avatar" class="profile-avatar">
                <h3 class="profile-name">{{$user->usuario}}</h3>
                <p class="profile-role">{{$user->nombre_apellido}}</p>
                
                <div class="profile-info">
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-envelope"></i> Email:</span>
                        <span class="info-value">{{$user->correo}}</span>
            </div>
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-id-card"></i> Cédula:</span>
                        <span class="info-value">{{$user->dni}}</span>
          </div>
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-phone"></i> Teléfono:</span>
                        <span class="info-value">{{$user->phones}}</span>
        </div>
                    <div class="info-item">
                        <span class="info-label"><i class="fas fa-map-marker-alt"></i> Dirección:</span>
                        <span class="info-value">{{$user->address}}</span>
        </div>
      </div>
                
                <div class="action-buttons">
                    <a href="{{route('asistencias.index')}}" class="btn-action">
                        <i class="fas fa-clipboard-check"></i> Asistencias
                    </a>
                    <a href="{{route('estudiantes.index')}}" class="btn-action">
                        <i class="fas fa-users"></i> Estudiantes
                    </a>
              </div>
          </div>
        </div>
        
        <div class="col-lg-8">
            @if(session('user')->roles=='Administrador')
            <div class="admin-section">
                <h3 class="admin-title">Panel de Administración</h3>
                <div class="admin-links">
                    <a href="{{route('usuarios.index')}}" class="admin-link">
                        <i class="fas fa-users-cog"></i>
                        <h4>Gestionar Usuarios</h4>
                        <p>Administrar usuarios del sistema</p>
                    </a>
                    <a href="{{route('estudiantes.index')}}" class="admin-link">
                        <i class="fas fa-user-graduate"></i>
                        <h4>Gestionar Estudiantes</h4>
                        <p>Registrar y administrar estudiantes</p>
                    </a>
                    <a href="{{route('cursos.index')}}" class="admin-link">
                        <i class="fas fa-book"></i>
                        <h4>Gestionar Cursos</h4>
                        <p>Administrar cursos y materias</p>
                    </a>
                    <a href="{{route('asistencias.index')}}" class="admin-link">
                        <i class="fas fa-clipboard-list"></i>
                        <h4>Control de Asistencia</h4>
                        <p>Registrar y revisar asistencias</p>
                    </a>
              </div>
            </div>
            @endif

            <div class="edit-form">
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
                
                <h3 class="form-title">Editar Perfil</h3>
    <form method="POST" action="{{ route('editar_usuario',$user->id) }}" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}">
                    
                    <div class="row">
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="nombre_apellido">
                                    <i class="fas fa-user"></i> Nombres y Apellidos
                                </label>
                                <input type="text" name="nombre_apellido" id="nombre_apellido" 
                                       class="form-control" value="{{$user->nombre_apellido}}">
                            </div>
        </div>
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="usuario">
                                    <i class="fas fa-user-circle"></i> Nombre de Usuario
                                </label>
                                <input type="text" name="usuario" id="usuario" 
                                       class="form-control" value="{{$user->usuario}}">
                            </div>
                        </div>
        </div>

                    <div class="row">
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="clave">
                                    <i class="fas fa-lock"></i> Contraseña
                                </label>
                                <input type="password" id="clave" name="clave" 
                                       class="form-control" placeholder="Nueva contraseña">
                            </div>
        </div>
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="dni">
                                    <i class="fas fa-id-card"></i> Cédula
                                </label>
                                <input type="text" name="dni" id="dni" 
                                       class="form-control" value="{{$user->dni}}" maxlength="10">
                            </div>
                        </div>
        </div>
                    
                    <div class="row">
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="phones">
                                    <i class="fas fa-phone"></i> Teléfono
                                </label>
                                <input type="text" name="phones" id="phones" 
                                       class="form-control" value="{{$user->phones}}" maxlength="10">
                            </div>
        </div>
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="address">
                                    <i class="fas fa-map-marker-alt"></i> Dirección
                                </label>
                                <input type="text" name="address" id="address" 
                                       class="form-control" value="{{$user->address}}">
                            </div>
                        </div>
        </div>
                    
                    <div class="row">
                        <div class="col-md-6">
          <div class="form-group">
                                <label for="roles">
                                    <i class="fas fa-user-tag"></i> Rol
                                </label>
          <select name="roles" id="roles" class="form-control">
                                    <option value="{{$user->roles}}">{{$user->roles}}</option>
                                    <option value="Estudiante">Estudiante</option>
                                    <option value="Profesor">Profesor</option>
                                    <option value="Administrador">Administrador</option>
          </select>
          </div>
                        </div>
                        <div class="col-md-6">
        <div class="form-group">
                                <label for="imgprofile">
                                    <i class="fas fa-camera"></i> Imagen de Perfil
                                </label>
                                <input type="file" name="imgprofile" id="imgprofile" class="form-control">
                            </div>
        </div>
        </div>
    
                    <div class="text-center">
                        <button type="submit" class="btn btn-edit">
                            <i class="fas fa-save"></i> ACTUALIZAR PERFIL
                        </button>
        </div>
    </form>
</div>
  </div>
</div>
</div>
@endsection



