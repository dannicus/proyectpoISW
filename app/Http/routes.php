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
	'auth' => 'Auth\AuthController',          //controlador registro
	'password' => 'Auth\PasswordController',
]);


// Nos mostrará el formulario de login.
Route::get('/', 'ControladorLogin@getIndex');

// Validamos los datos de inicio de sesión.
Route::post('/', 'ControladorLogin@postLogin');

Route::get('home', 'HomeController@index');

/*
// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
	// Esta será nuestra ruta de bienvenida.
	Route::get('/', 'ControladorLogin@getIndex');

	// Esta ruta nos servirá para cerrar sesión.
	Route::get('logout', 'ControladorLogin@logOut');
});
*/