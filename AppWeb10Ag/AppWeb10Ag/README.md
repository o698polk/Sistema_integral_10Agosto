# Sistema de Asistencia Virtual - Colegio "10 de Agosto"

## Descripción

Sistema de Asistencia Virtual desarrollado para el Colegio "10 de Agosto" del cantón San Lorenzo, Esmeraldas. Este sistema permite la gestión integral de asistencia estudiantil con control eficiente, reportes detallados y seguimiento académico en tiempo real.

## Características Principales

### 🎓 Gestión Educativa Integral
- **Control de Asistencia**: Registro automático con opciones de justificación
- **Gestión de Estudiantes**: Registro completo con información personal y académica
- **Administración de Cursos**: Gestión de materias, horarios y profesores
- **Reportes Académicos**: Estadísticas detalladas y análisis de rendimiento

### 🔐 Sistema de Seguridad
- **Autenticación Segura**: Login con roles diferenciados
- **Roles de Usuario**: Administrador, Profesor, Estudiante
- **Encriptación de Datos**: Contraseñas seguras con Hash
- **Control de Acceso**: Permisos basados en roles

### 📱 Interfaz Moderna
- **Diseño Responsive**: Adaptable a dispositivos móviles
- **Colores Institucionales**: Rojo, naranja y blanco
- **Experiencia de Usuario**: Interfaz intuitiva y moderna
- **Iconografía Educativa**: Iconos relacionados con la educación

## Tecnologías Utilizadas

- **Backend**: Laravel 10 (PHP 8.1+)
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Base de Datos**: MySQL
- **Herramientas**: Vite, Composer
- **IDE**: Visual Studio Code

## Estructura del Sistema

### Modelos de Datos
1. **Usuario**: Gestión de usuarios del sistema (Administradores, Profesores, Estudiantes)
2. **Estudiante**: Información completa de estudiantes con datos personales y académicos
3. **Curso**: Gestión de materias, horarios y asignación de profesores
4. **Inscripción**: Relación estudiantes-cursos para control de matrículas
5. **Asistencia**: Control de asistencia diaria con estados y justificaciones

### Funcionalidades Principales
- ✅ **Registro y autenticación de usuarios** con roles diferenciados
- ✅ **Gestión completa de estudiantes** con información personal y académica
- ✅ **Administración de cursos y materias** con horarios y profesores
- ✅ **Control de asistencia individual y masiva** con estados y justificaciones
- ✅ **Reportes y estadísticas** en tiempo real
- ✅ **Interfaz administrativa** moderna y responsive
- ✅ **Sistema de notificaciones** por correo electrónico
- ✅ **Búsqueda y filtros** avanzados para todas las entidades

## Instalación

1. **Clonar el repositorio**
```bash
git clone [url-del-repositorio]
cd sistema-asistencia
```

2. **Instalar dependencias**
```bash
composer install
npm install
```

3. **Configurar base de datos**
```bash
cp .env.example .env
# Editar .env con credenciales de base de datos
```

4. **Ejecutar migraciones**
```bash
php artisan migrate
```

5. **Generar clave de aplicación**
```bash
php artisan key:generate
```

6. **Iniciar servidor**
```bash
php artisan serve
```

## Estructura de Base de Datos

### Tablas Principales
- `usuarios`: Usuarios del sistema
- `estudiantes`: Información de estudiantes
- `cursos`: Materias y horarios
- `inscripciones`: Relación estudiantes-cursos
- `asistencias`: Registro de asistencia

### Relaciones
- Un Usuario puede tener múltiples Estudiantes
- Un Curso pertenece a un Usuario (profesor)
- Un Estudiante puede estar inscrito en múltiples Cursos
- Una Asistencia registra la presencia de un Estudiante en un Curso

## Roles de Usuario

### Administrador
- Gestión completa de usuarios
- Administración de estudiantes
- Gestión de cursos
- Control de asistencia
- Reportes del sistema

### Profesor
- Ver sus cursos asignados
- Registrar asistencia
- Ver reportes de sus estudiantes

### Estudiante
- Ver su información personal
- Consultar su asistencia
- Ver sus cursos inscritos

## Características de Diseño

### Paleta de Colores
- **Rojo Principal**: #ff6b35
- **Naranja Secundario**: #f7931e
- **Blanco**: #ffffff
- **Grises**: Para textos y elementos secundarios

### Elementos de Diseño
- Gradientes modernos
- Sombras suaves
- Bordes redondeados
- Iconografía FontAwesome
- Animaciones CSS

## Contribuciones

Se invita a la comunidad educativa y desarrolladores a contribuir al proyecto:

- Reportar problemas (issues)
- Sugerir mejoras (pull requests)
- Mejorar la documentación
- Agregar nuevas funcionalidades

## Licencia

Este proyecto está desarrollado para uso educativo del Colegio "10 de Agosto".

---

**Desarrollado para el Colegio "10 de Agosto" - Cantón San Lorenzo, Esmeraldas**
