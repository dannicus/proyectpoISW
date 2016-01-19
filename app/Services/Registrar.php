<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'nombre'=> 'required|max:15',
			'apellidos'=> 'required|max:15',
			'rut'=> 'required|max:12|unique:users,rut',
			'email' => 'required|unique:users,email|max:20',
			'password'=> 'required|min:6|max:60',
			'tipo' => 'required|in:alumno, profesor'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'nombre' => $data['nombre'],
			'apellidos' => $data['apellidos'],
			'rut' => $data['rut'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'tipo' => $data['tipo']
		]);
	}

	public function store(Request $request){

		$user =new User($request::all());
		$user ->save();

		\Redirect::route (url('auth.login'));

	}

}
