@extends('layouts.app')

@section('content')
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
        {!! Form::open(['route' => ['coustumer.update', $user[0]->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            {!! Form::hidden('id', $user[0]->id) !!}
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name') !!}
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email') !!}
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password') !!}
            {!! Form::submit('Guardar') !!}
        {!! Form::close() !!}
    </div>

@endsection