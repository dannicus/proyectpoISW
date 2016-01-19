@extends('layouts.masterLogin')

@section('titulo')
	Registro
@stop


@section('css')
	<link href="{{ asset('css/login_estilo.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>ERROR!</strong> Acá te mostramos tus errores.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('nombre', 'Nombre') !!}
								{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su nombre']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('apellidos', 'apellidos') !!}
								{!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese sus apellidos']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('rut', 'Rut') !!}
								{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su Rut']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su Email']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('password', 'Contraseña') !!}
								{!! Form::password('password', null,['class' => 'form-control', 'placeholder' => 'Ingrese su contraseña']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('password_confirmacion', 'Confirmar Contraseña') !!}
								{!! Form::password('password_confirmacion', null,['class' => 'form-control', 'placeholder' => 'Repita su contraseña']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6">
								{!! Form::label('tipo', 'Tipo de usuario') !!}
								{!! Form::select('tipo',['' => 'Seleccione un tipo', 'alumno' => 'Alumno', 'profesor' => 'Profesor'], null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
