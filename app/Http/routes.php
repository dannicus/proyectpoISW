<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
//	'/' => 'ControladorLogin',
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::resource('alumno', 'AlumnoController');

// Nos mostrar� el formulario de login.
Route::get('/', 'ControladorLogin@getIndex');

// Validamos los datos de inicio de sesi�n.
Route::post('/', 'ControladorLogin@postLogin');

// Nos indica que las rutas que est�n dentro de �l s�lo ser�n mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta ser� nuestra ruta de bienvenida.
	Route::get('/', 'ControladorLogin@getIndex');

	// Esta ruta nos servir� para cerrar sesi�n.
	Route::get('logout', 'ControladorLogin@logOut');
});