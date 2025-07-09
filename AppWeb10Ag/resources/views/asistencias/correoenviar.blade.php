<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Asistencia - Colegio 10 de Agosto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .info-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 5px solid #ff6b35;
        }
        .status-presente {
            color: #28a745;
            font-weight: bold;
        }
        .status-ausente {
            color: #dc3545;
            font-weight: bold;
        }
        .status-tardanza {
            color: #ffc107;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>COLEGIO "10 DE AGOSTO"</h1>
        <h2>Sistema de Asistencia Virtual</h2>
        <p>Cantón San Lorenzo - Esmeraldas</p>
    </div>
    
    <div class="content">
        <h3>Notificación de Asistencia</h3>
        
        <div class="info-card">
            <h4>Información del Estudiante</h4>
            <p><strong>Nombre:</strong> {{ $dato->estudiante->nombres }} {{ $dato->estudiante->apellidos }}</p>
            <p><strong>Código:</strong> {{ $dato->estudiante->codigo_estudiante }}</p>
            <p><strong>Cédula:</strong> {{ $dato->estudiante->cedula }}</p>
        </div>
        
        <div class="info-card">
            <h4>Información del Curso</h4>
            <p><strong>Curso:</strong> {{ $dato->curso->nombre_curso }}</p>
            <p><strong>Código:</strong> {{ $dato->curso->codigo_curso }}</p>
            <p><strong>Aula:</strong> {{ $dato->curso->aula }}</p>
        </div>
        
        <div class="info-card">
            <h4>Registro de Asistencia</h4>
            <p><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($dato->fecha)->format('d/m/Y') }}</p>
            <p><strong>Hora de Entrada:</strong> {{ $dato->hora_entrada ?? 'No registrada' }}</p>
            <p><strong>Hora de Salida:</strong> {{ $dato->hora_salida ?? 'No registrada' }}</p>
            <p><strong>Estado:</strong> 
                <span class="status-{{ strtolower($dato->estado) }}">
                    {{ ucfirst($dato->estado) }}
                </span>
            </p>
            @if($dato->justificacion)
                <p><strong>Justificación:</strong> {{ $dato->justificacion }}</p>
            @endif
        </div>
        
        <div class="info-card">
            <h4>Registrado por</h4>
            <p><strong>Profesor:</strong> {{ $dato->usuario->nombre_apellido }}</p>
            <p><strong>Fecha de Registro:</strong> {{ \Carbon\Carbon::parse($dato->created_at)->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
    
    <div class="footer">
        <p>Este es un mensaje automático del Sistema de Asistencia Virtual del Colegio "10 de Agosto"</p>
        <p>Para consultas, contacte a la administración del colegio</p>
        <p>&copy; {{ date('Y') }} Colegio "10 de Agosto" - Cantón San Lorenzo, Esmeraldas</p>
    </div>
</body>
</html> 