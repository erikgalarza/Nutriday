<?php

use App\Models\Dieta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DietaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ClienteController;

use App\Http\Controllers\AlimentoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\MedidaAlimentoController;
use App\Http\Controllers\CategoriaAlimentoController;
use App\Http\Controllers\DatosAntropometricoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// ============================= RUTAS PUBLICAS ============================ //



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contactanos',[HomeController::class,'contactanos'])->name('home.contactanos');
Route::get('/nosotros',[HomeController::class, 'nosotros'])->name('home.nosotros');
Route::post('/contactar',[HomeController::class, 'contactar'])->name('home.contactar');

Route::post('/login2',[LoginController::class,'login'])->name('login2');

// ============================= RUTAS PARA ADMINISTRADORES ============================ //
Route::group(['prefix' => 'admin', 'middleware'=>'admin'], function () {
Route::resource('administrador',AdminController::class);
Route::resource('nutricionista',NutricionistaController::class);
Route::get('/mi-perfil',[AdminController::class,'miCuenta'])->name('admin.cuenta');
Route::get('/editar-perfil',[AdminController::class,'formCuenta'])->name('admin.editarCuenta');
Route::post('/editar-perfil',[AdminController::class,'updateCuenta'])->name('admin.updateCuenta');
Route::get('/listado',[AdminController::class,'listar'])->name('administrador.listar');
Route::get('/login-administrador',[LoginController::class,'loginAdmin'])->name('login.administrador');
Route::post('/registrar',[RegController::class,'registrarAdmin'])->name('administrador.registrar');
// Route::post('/guardar',[AdminController::class,'store'])->name('administracion.store');
// Route::get('/listado/pacientes',[AdminController::class,'listarPacientes'])->name('administrador.indexPaciente');
});


// ================================== RUTAS PARA NUTRICIONISTAS ============================ //
Route::group(['prefix' => 'nutricionista', 'middleware'=>'nutri'], function () {
    // Route::get('/',[NutricionistaController::class,'dashboard'])->name('nutricionista.dashboard');
    Route::get('/mi-cuenta',[NutricionistaController::class,'miCuenta'])->name('nutricionista.cuenta');
    Route::get('/editar-perfil',[NutricionistaController::class,'formCuenta'])->name('nutricionista.editarCuenta');
    Route::post('/editar-perfil',[NutricionistaController::class,'updateCuenta'])->name('nutricionista.updateCuenta');
    
    Route::post('/login-nutricionista',[LoginController::class,'loginPaciente'])->name('login.nutricionista');
   });


// ================================= RUTAS PARA ADMINS Y NUTRICIONISTAS ===================== //
Route::group(['prefix' => 'dashboard','middleware'=>'admin_nutri'],function () {
    Route::get('/',[AdminController::class,'dashboard'])->name('administrador.dashboard');
    Route::resource('alimento',AlimentoController::class);
    Route::resource('paciente',PacienteController::class);
    Route::resource('dieta',DietaController::class);
    Route::resource('video',VideoController::class);
    Route::resource('actividad',ActividadController::class);
    Route::resource('categoriaAlimento',CategoriaAlimentoController::class);
    Route::resource('medidaAlimento', MedidaAlimentoController::class);

    Route::get('/actividades/asignar/{paciente_id}',[ActividadController::class,'asignar'])->name('actividad.asignar');
    Route::post('/actividades/asignar',[ActividadController::class,'guardarAsignacion'])->name('actividad.guardarAsignacion');
    Route::get('/actividades/pacientes',[ActividadController::class,'pacientes'])->name('actividad.pacientes');


    Route::get('/alimento-agregar',[AlimentoController::class,'agregarAlimento'])->name('alimento.addAlimento');
    Route::get('/alimento/agregar/{dieta_id}',[AlimentoController::class,'addAlimentoDieta'])->name('alimento.addAlimentoDieta');
    Route::get('/alimentos/dieta/{dieta_id}',[AlimentoController::class,'alimentosByDieta'])->name('alimento.alimentosByDieta');
    Route::get('/actividades/paciente/{paciente_id}',[ActividadController::class,'actividadesByPaciente'])->name('actividad.actividadesByPaciente');
    Route::resource('datosantropometrico',DatosAntropometricoController::class);
    Route::post('/dieta/crearDieta',[DietaController::class,'crearDietaFlash'])->name('dieta.crearDietaFlash');
    Route::get('/datos-antropometricos/agregar/{paciente_id}',[DatosAntropometricoController::class,'agregarDatosAntropometricos'])->name('admin.agregarDatosAntropometricos');
    Route::get('/dieta/eliminar/{id}',[DietaController::class,'eliminarDieta'])->name('dieta.eliminarDieta');
    // Route::get('/dieta/asignar',[DietaController::class,'asignarDieta'])->name('dieta.asignarDieta');
    Route::get('/asignar-dieta',[DietaController::class,'asignarDieta'])->name('dieta.asignarDieta');
    Route::post('/dieta-asignada/guardar',[DietaController::class,'guardarDietaAsignada'])->name('dieta.guardarDietaAsignada');

    //rutas agregadas 16/06/2022
    //DIETAS
    Route::get('/asignar-dieta/paciente',[DietaController::class,'buscarPacientes'])->name('dieta.buscarPacientes');
    Route::get('/dietas/paciente/{paciente_id}',[DietaController::class,'dietasByPaciente'])->name('dieta.dietasByPaciente');
    //DATOS ANTROPOMETRICOS
    Route::get('/asignar-datos-antropometricos',[DatosAntropometricoController::class,'asignarDatosAntropometricos'])->name('da.asignarDatosAntropometricos');
    Route::get('/asignar-datos-antropometricos/paciente',[DatosAntropometricoController::class,'buscarPacientes'])->name('da.buscarPacientes');
    Route::get('/datos-antropometricos/paciente/{paciente_id}',[DatosAntropometricoController::class,'datosByPaciente'])->name('da.datosByPaciente');

    //rutas agregadas 17/06/2022
  
    
    
    Route::get('/paciente/historial/{paciente_id}',[PacienteController::class,'historialPaciente'])->name('paciente.historial');
    Route::get('/paciente/eliminar/{id}',[PacienteController::class,'eliminarPaciente'])->name('paciente.eliminar');
    Route::get('/paciente/datos-antropometricos',[PacienteController::class,'datosAntropometricos'])->name('paciente.datosAntropometricos');
    Route::post('/paciente/datos-antropometricos',[PacienteController::class,'guardarDatosAntropometricos'])->name('paciente.guardarDatosAntropometricos');
    Route::post('/paciente/actualizar',[PacienteController::class,'actualizarPaciente'])->name('paciente.actualizar');
    Route::get('/paciente/estados/{paciente_id}',[PacienteController::class,'estadosPaciente'])->name('paciente.estadosPaciente');
});


//--------------------- RUTAS CON AJAX 2 ---------------------//
    Route::get('/alimento/datos',[AlimentoController::class,'datosAlimento'])->name('alimento.datosAlimento');
     //RUTA CON AJAX PARA GUARDAR LA DIETA CON LOS ALIMENTOS Y DEMAS
     Route::get('/guardarDietaAsignada',[DietaController::class,'guardarDieta'])->name('dieta.guardarDieta');
    Route::get('/alimento/datos/guardar',[AlimentoController::class,'datosDietaGuardar'])->name('alimento.datosDietaGuardar');
    // Route::cambios
    Route::get('/dieta/alimentos',[DietaController::class,'traerAlimentos'])->name('dieta.traerAlimentos');


// ============================= RUTAS PARA CLIENTES ============================ //
Route::group(['middleware'=>'paciente'], function () {
    Route::get('/perfil',[ClienteController::class,'principal'])->name('cliente.dashboard');
    Route::get('/mi-cuenta',[ClienteController::class,'miCuenta'])->name('cliente.cuenta');
    Route::get('/editar-perfil',[ClienteController::class,'formCuenta'])->name('cliente.editarCuenta');
    Route::get('/dietas',[ClienteController::class,'misDietas'])->name('cliente.misDietas');
    Route::get('/dieta/{dieta_id}/detalle',[ClienteController::class,'detalleDieta'])->name('cliente.detalleDieta');
    Route::get('/dieta/{dieta_id}',[ClienteController::class,'verDieta'])->name('cliente.verDieta');
    Route::post('/editar-perfil',[ClienteController::class,'updateCuenta'])->name('cliente.updateCuenta');
    Route::get('/estadodeanimo',[ClienteController::class,'estadoAnimo'])->name('cliente.estadoAnimo');
    Route::post('/estado-de-animo',[ClienteController::class,'guardarEstadoAnimo'])->name('cliente.guardarEstadoAnimo');
    Route::post('/login-paciente',[LoginController::class,'loginPaciente'])->name('login.paciente');
    

    Route::get('/videos',[ClienteController::class,'videos'])->name('cliente.videos');
    Route::get('/actividades',[ClienteController::class,'misActividades'])->name('cliente.misActividades');
   });



