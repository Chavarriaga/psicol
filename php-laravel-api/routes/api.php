<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// api routes that need auth

Route::middleware(['auth:api'])->group(function () {


});

Route::get('home', 'HomeController@index');


/* routes for Asignaturas Controller  */	
	Route::get('asignaturas/', 'AsignaturasController@index');
	Route::get('asignaturas/index', 'AsignaturasController@index');
	Route::get('asignaturas/index/{filter?}/{filtervalue?}', 'AsignaturasController@index');	
	Route::get('asignaturas/view/{rec_id}', 'AsignaturasController@view');	
	Route::post('asignaturas/add', 'AsignaturasController@add');	
	Route::any('asignaturas/edit/{rec_id}', 'AsignaturasController@edit');	
	Route::any('asignaturas/delete/{rec_id}', 'AsignaturasController@delete');

/* routes for Estudiantes Controller  */	
	Route::get('estudiantes/', 'EstudiantesController@index');
	Route::get('estudiantes/index', 'EstudiantesController@index');
	Route::get('estudiantes/index/{filter?}/{filtervalue?}', 'EstudiantesController@index');	
	Route::get('estudiantes/view/{rec_id}', 'EstudiantesController@view');	
	Route::post('estudiantes/add', 'EstudiantesController@add');	
	Route::any('estudiantes/edit/{rec_id}', 'EstudiantesController@edit');	
	Route::any('estudiantes/delete/{rec_id}', 'EstudiantesController@delete');

/* routes for Profesores Controller  */	
	Route::get('profesores/', 'ProfesoresController@index');
	Route::get('profesores/index', 'ProfesoresController@index');
	Route::get('profesores/index/{filter?}/{filtervalue?}', 'ProfesoresController@index');	
	Route::get('profesores/view/{rec_id}', 'ProfesoresController@view');	
	Route::post('profesores/add', 'ProfesoresController@add');	
	Route::any('profesores/edit/{rec_id}', 'ProfesoresController@edit');	
	Route::any('profesores/delete/{rec_id}', 'ProfesoresController@delete');

/* routes for Profesorestudianteasignatura Controller  */	
	Route::get('profesorestudianteasignatura/', 'ProfesorestudianteasignaturaController@index');
	Route::get('profesorestudianteasignatura/index', 'ProfesorestudianteasignaturaController@index');
	Route::get('profesorestudianteasignatura/index/{filter?}/{filtervalue?}', 'ProfesorestudianteasignaturaController@index');	
	Route::get('profesorestudianteasignatura/view/{rec_id}', 'ProfesorestudianteasignaturaController@view');	
	Route::post('profesorestudianteasignatura/add', 'ProfesorestudianteasignaturaController@add');	
	Route::any('profesorestudianteasignatura/edit/{rec_id}', 'ProfesorestudianteasignaturaController@edit');	
	Route::any('profesorestudianteasignatura/delete/{rec_id}', 'ProfesorestudianteasignaturaController@delete');
	
	Route::get('components_data/idprofesor_option_list/{arg1?}', 'Components_dataController@idprofesor_option_list');	
	Route::get('components_data/idestudiante_option_list/{arg1?}', 'Components_dataController@idestudiante_option_list');	
	Route::get('components_data/idasignatura_option_list/{arg1?}', 'Components_dataController@idasignatura_option_list');


/* routes for FileUpload Controller  */	
Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');