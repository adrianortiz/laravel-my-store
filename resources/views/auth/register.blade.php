@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        {!! Form::hidden('type', $type='coustumer') !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('paterno') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido paterno</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="paterno" value="{{ old('paterno') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('materno') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="materno" value="{{ old('materno') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="sel1">Sexo</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label><input type="radio" name="sexo" value="Masculino">Masculino</label>
                                    <label><input type="radio" name="sexo" value="Femenino">Femenino</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_na') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="sel1">Fecha de nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="fecha_na">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                                <a href="{{ route('store.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
