@extends('admin.layout-panel')

@section('title', 'Panel Edicion de Administradores')

@section('content')

    <div class="container panel-container">

        <div class="page-header">
            <h1>Edicion de Administradores
                <small>Panel</small>
            </h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>

                        <div id="edit" class="panel-body">
                            {!! Form::open(['route' => ['admin.update', $user[0]->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                            {!! Form::hidden('id', $user[0]->id) !!}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{ $user[0]->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control" name="email" value="{{ $user[0]->email }}">
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
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger">Cancelar</a>
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

@section('extra-scripts')

    <script>$('header div ul li:nth-child(7) a').addClass('active-menu');</script>

@endsection
