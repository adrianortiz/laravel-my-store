@extends('layouts.app')

@section('title', 'Panel Edicion de usuario')

@section('content')

    <div class="container panel-container">

        <div class="page-header">
            <h1>Edicion de Usuario
                <small>Panel</small>
            </h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div id="edit" class="panel-body">
                            {!! Form::open(['route' => ['client.update', $user[0]->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('id', $user[0]->id) !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $user[0]->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Apellido paterno</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="paterno" value="{{ $user[0]->paterno }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Apellido Materno</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="materno" value="{{ $user[0]->materno }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $user[0]->email }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="sel1">Sexo</label>
                                <div class="col-md-6">
                                    <div class="radio">
                                        <label><input type="radio" name="sexo" value="Masculino">Masculino</label>
                                        <label><input type="radio" name="sexo" value="Femenino">Femenino</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="sel1">Fecha de nacimiento</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" name="fecha_na" value="{{ $user[0]->fecha_na }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-info" role="button">Actualizar</button>
                                    <a href="{{ route('client.show') }}" class="btn btn-danger">Cancelar</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
