@extends('layouts.masterLogin')

@section('css')
	<link href="{!! asset('css/login_estilo.css') !!}" rel="stylesheet">
@stop

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Resetear Contrase�a</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{!! session('status') !!}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>ERROR!</strong> Ac� te mostramos tus errores.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{!! $error !!}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{!! url('/password/email') !!}">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{!! old('email') !!}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Enviar link para resetear contrase�a
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
