<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\HorarioController;
use  App\Mail\EviarCorreo;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/***********PAGINAS PRINCIPALES **************************/
Route::get('/', [HomeController::class, 'Index'])->name('home');
Route::get('/register', [HomeController::class, 'Register'])->name('register');
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::get('/dashboard', [HomeController::class, 'Dashboard'])->name('dashboard');
Route::get('/salir', [HomeController::class, 'Salir'])->name('salir');
/************************************/

/***********AUTORIZACION**************************/
Route::post('/registrar_usuario', [UsuarioController::class, 'Registrar_usuario'])->name('registrar_usuario');
Route::post('/buscarusuario', [UsuarioController::class, 'buscar'])->name('buscarus');
Route::post('/buscarestudiante', [EstudianteController::class, 'buscar'])->name('buscarestudiante');
Route::get('/estudiantes/buscar', [EstudianteController::class, 'buscar'])->name('estudiantes.buscar');
Route::post('/buscarcursos', [CursoController::class, 'buscar'])->name('buscarcursos');
Route::post('/buscarasistencias', [AsistenciaController::class, 'buscar'])->name('buscarasistencias');
Route::post('/asistencias/buscar', [AsistenciaController::class, 'buscar'])->name('asistencias.buscar');
Route::post('/registrar-asistencia-masiva', [AsistenciaController::class, 'registrarMasiva'])->name('registrar-asistencia-masiva');
Route::get('/asistencias/registrar-masiva', [AsistenciaController::class, 'registrarMasivaForm'])->name('asistencias.registrar-masiva');

Route::put('/editar_usuario/{id}', [UsuarioController::class, 'update'])->name('editar_usuario');

Route::post('/login', [UsuarioController::class, 'Login'])->name('loginuser');
/************************************/


Route::resource('/usuarios', UsuarioController::class);
Route::resource('/estudiantes', EstudianteController::class);
Route::post('/estudiantes/{id}/asignar-cursos', [EstudianteController::class, 'asignarCursos'])->name('estudiantes.asignar-cursos');
Route::get('/estudiantes/{id}/cursos', [EstudianteController::class, 'verCursos'])->name('estudiantes.cursos');
Route::resource('/cursos', CursoController::class);
Route::resource('/asistencias', AsistenciaController::class);

// Rutas para Materias
Route::resource('/materias', MateriaController::class);
Route::post('/materias/buscar', [MateriaController::class, 'buscar'])->name('materias.buscar');

// Rutas para Horarios
Route::resource('/horarios', HorarioController::class);
Route::post('/horarios/buscar', [HorarioController::class, 'buscar'])->name('horarios.buscar');
Route::get('/horarios/consulta/por-curso', [HorarioController::class, 'horariosPorCurso'])->name('horarios.horarios-por-curso');



/***************************ENVIAR CORREOS ****************/

Route::post('/enviarcorreo', [AsistenciaController::class, 'enviarcorreo'])->name('enviarcorreo');
Route::get('/enviarcorreodestino/{id}', [AsistenciaController::class, 'enviarcorreodestino'])->name('enviarcorreodestino');