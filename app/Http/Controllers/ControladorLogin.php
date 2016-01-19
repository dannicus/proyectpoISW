<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class ControladorLogin extends Controller
{
    protected $layout = 'layouts.masterLogin';

    public function getIndex()
    {
        return $this->layout = view('login.indexLogin');
    }


    public function postLogin()
    {
        //Guardamos en un arreglo los datos del usuario
        $userdata = array(
            'rut' => Input::get('rut'),
            'password' => Input::get('password')
        );

        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if(Auth::attempt($userdata, Input::get('Recuerdame', 0)))
        {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('/');
        }

        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('/')
            ->with('mensaje_error', 'Tus datos son incorrectos')->withInput();

    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('/')
            ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



}