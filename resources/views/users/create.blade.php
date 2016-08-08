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
            width: 300px;
            display: block;
        }
    </style>

   <form method="POST" action="{{ url('insert') }}">
       {!! csrf_field() !!}
       <label>Nombre</label>
       <input type="text" placeholder="Escribe tu nombre" name="name">
       <label>Correo electronico</label>
       <input type="email" placeholder="Escribe tu Correo electronico" name="email">
       <label>Password</label>
       <input type="password" placeholder="Escribe tu password" name="password">
       <input type="hidden" name="type" value="coustumer">
       <button type="submit">Registrarse</button>
   </form>

@endsection
