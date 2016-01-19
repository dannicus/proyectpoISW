@extends('layouts.masterLogin')

@section('titulo')
    Bienvenido a SAGGAP
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::label('rut', 'Rut') !!}
                                {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Ej.: 11111111-1']) !!}
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
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Entrar</button>

                                <a class="btn btn-link" href="{{ url('/password/email') }}">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
    @stop


