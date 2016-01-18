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
			'nombre'=> 'required',
			'apellidos'=> 'required',
			'rut'=> 'required',
			'email' => 'required|unique:users,email',
			'password'=> 'required',
			'tipo' => 'required'
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

		\Redirect::route (url('/auth/login'));

	}

}
