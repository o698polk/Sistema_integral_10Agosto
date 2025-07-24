Sistema de Gestión Académica - Laravel + XAMPP
Este proyecto es una plataforma académica integral desarrollada con Laravel 10 y ejecutada en un entorno local utilizando XAMPP. El sistema está orientado a instituciones educativas y cuenta con tres módulos principales que permiten gestionar eficientemente la asistencia estudiantil, realizar procesos de votación interna y distribuir recursos educativos digitales.

📌 Características principales
✅ Módulo de Asistencia de Estudiantes
Registro de asistencia diaria por curso y paralelo.

Control por fecha y hora con posibilidad de registrar retardos o justificaciones.

Visualización de reportes de asistencia por estudiante, curso o rango de fechas.

Roles diferenciados: Docente (marca asistencia) y Administrador (consulta y exporta reportes).

Exportación de reportes a PDF o Excel.

🗳️ Módulo de Votaciones
Creación y administración de votaciones internas (como elecciones estudiantiles).

Soporte para múltiples candidatos y cargos.

Votación anónima y segura por parte de estudiantes o personal autorizado.

Resultados en tiempo real con gráficas dinámicas.

Control de acceso por rol para evitar votos duplicados.

📚 Módulo de Recursos Educativos
Carga de materiales por parte de docentes o administradores (PDF, videos, enlaces, etc.).

Clasificación por materias, niveles y unidades.

Descarga segura de recursos por parte de estudiantes.

Vista previa de documentos y enlaces embebidos.

Historial de recursos consultados por estudiante.

🛠️ Tecnologías utilizadas
Framework: Laravel 10

Servidor local: XAMPP (Apache + MySQL + PHP 8.x)

Base de datos: MySQL

Frontend: Blade Templates, Bootstrap 5, JavaScript

Control de versiones: Git

🚀 Instalación local (requisitos)
Tener instalado XAMPP

Clonar el repositorio:

bash
Copiar
Editar
git clone https://github.com/tuusuario/nombre-del-repositorio.git
Copiar el contenido en la carpeta htdocs de XAMPP.

Abrir la terminal y navegar al directorio del proyecto:

bash
Copiar
Editar
cd htdocs/nombre-del-proyecto
Instalar dependencias:

bash
Copiar
Editar
composer install
Configurar archivo .env con tus credenciales de base de datos.

Ejecutar las migraciones:

bash
Copiar
Editar
php artisan migrate
(Opcional) Sembrar datos de prueba:

bash
Copiar
Editar
php artisan db:seed
Levantar el servidor:

bash
Copiar
Editar
php artisan serve
👥 Roles del sistema
Administrador: Control total sobre usuarios, votaciones, recursos y reportes.

Docente: Gestión de asistencia y carga de recursos educativos.

Estudiante: Consulta de recursos y participación en votaciones.

🧪 Estado del proyecto
🟢 100% funcional en entorno local.

🛠️ En desarrollo para implementación en producción.

🚧 Futuras versiones incluirán notificaciones, panel estadístico avanzado y API REST.

📄 Licencia
Este proyecto se distribuye bajo la licencia MIT.

🤝 Contribuciones
¡Se aceptan contribuciones! Si deseas colaborar, abre un issue o realiza un fork del proyecto.











LINK DEL PROYECTO PRINCIPAL V001:https://www.mediafire.com/file/en0wy7028d1uiy2/Proeycto\_integral\_practicas.zip/file





maria.gonzalez@colegio.edu.ec  Administrador

123456



ana.martinez@colegio.edu.ec

123456



juan.perez@colegio.edu.ec

123456

