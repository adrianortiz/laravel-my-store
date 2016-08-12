@extends('admin.layout-panel')

@section('title', 'Panel Edicion de Administradores')

@section('content')

    <div class="container panel-container">

        <div class="page-header">
            <h1>Edicion de Administradores
                <small>Panel</small>
            </h1>
        </div>

        <style>
            #edit {
                width: 800px;
                margin: 0 auto;
                display: block;
            }

            input{
                display: inline-block;
                width: 450px;
                margin-bottom: 25px;
            }

            label {
                width: 300px;
            }

            button{
                width: 200px;
                margin: 0 auto;
                display: block;
                margin-top: 50px;
            }

        </style>

        <div id="edit">
            {!! Form::open(['route' => ['admin.update', $user[0]->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('id', $user[0]->id) !!}
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $user[0]->name) !!}
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', $user[0]->email) !!}
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password') !!}
            {!! Form::submit('Guardar') !!}
            {!! Form::close() !!}
        </div>

@endsection

@section('extra-scripts')

    <script>$('header div ul li:nth-child(7) a').addClass('active-menu');</script>

@endsection
