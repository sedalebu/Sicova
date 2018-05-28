<?php

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

Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => 'auth'], function () {
	
Route::group(['middleware' => 'userAdmin'], function () {

Route::resource('admin/centro/sede','SedeController');
Route::resource('admin/centro/ambiente','AmbienteController');
Route::resource('admin/gestion/formularios','FormularioController');
Route::resource('admin/gestion/preguntas','PreguntaController');
Route::resource('admin/gestion/usuarios','UsuarioController');
Route::resource('admin/gestion/gfichas','FichaController');
Route::resource('admin/gestion/asignacion','AsignacionFichaController');
Route::resource('admin/gestion/asgambiente','AsignacionAmbienteController');
Route::resource('admin/gestion/programas','ProgramaController');
Route::resource('admin/gestion/registroformulario','RegistroFormularioController');
Route::resource('admin/usuarios','UsuariosController');
Route::resource('admin','AdminController');
});



Route::group(['middleware' => 'userInstructor'], function () 
{
Route::resource('instructor/formulario','RespuestaController');
Route::resource('instructor/ficha','InstructorFichaController');
Route::resource('instructor/lista','ListaController');
Route::resource('instructor/registroformulario','RegistroFormularioController');
Route::resource('instructor','InstructorController');
});


});


Route::group(['middleware' =>'Home'], function () {

Route::get('/home', 'HomeController@index')->name('home');

});


Auth::routes();