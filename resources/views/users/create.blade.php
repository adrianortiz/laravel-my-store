@extends('layouts.app')

@section('content')

    <style>
        form{
            margin: 0 auto;
            width: 600px;
        }

        label{
            width: 150px;;
        }

        input{
            width: 440px;
            margin-bottom: 30px;
        }

        button{
            margin: 0 auto;
            width: 150px;
            display: block;
        }
    </style>

    {!! Form::open(['route' => ['coustumer.create'], 'method' => 'POST']) !!}
    <label>Nombre</label>
    <input type="text" placeholder="Escribe tu nombre" name="name">
    <label>Correo electronico</label>
    <input type="email" placeholder="Escribe tu Correo electronico" name="email">
    <label>Password</label>
    <input type="password" placeholder="Escribe tu password" name="password">
    <button type="submit" class="btn btn-info" role="button">Registrarse</button>
    {!! Form::close() !!}

@endsection
