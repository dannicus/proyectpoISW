<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Muestra el formulario de registro para un nuevo usuario
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Recibe los datos de registro de un nuevo usuario
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{

		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

	/**
	 * Muestra el formulario para iniciar sesi�n
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Maneja los datos de inicio de sesi�n
	 * (los datos enviados desde el formulario entregado por la funci�n getLogin de este Controlador)     *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'rut' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('rut', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			// Si la autenticaci�n fu� correcta:
			return redirect()->intended($this->redirectPath());
		}

		// Si los datos de inicio de sesi�n fueron incorrectos, se vuelve a mostrar formulario de inicio de sesi�n junto
		// a los errores
		return redirect($this->loginPath())
			->withInput($request->only('rut', 'remember'))
			->withErrors([
				'rut' => $this->getFailedLoginMessage(),
			]);
	}

	/**
	 * Cierra sesi�n de usuario
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	/**
	 * Retorna la ruta para redireccionar luego de:
	 *  - Un registro exitodo de un nuevo usuario
	 *  - Despu�s de un login exitoso
	 * @return string
	 */
	public function redirectPath()
	{
		return '/home';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return '/auth/login';
	}


}
