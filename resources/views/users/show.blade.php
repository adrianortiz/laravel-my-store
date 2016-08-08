@extends('layouts.app')

@section('content')
    <style>
        table{
            width: 1200px;
            margin: 0 auto;
            display: block;

        }

        tbody{
            width: 100%;
        }

        th{
            width: 300px;
            text-align: center;
        }

        button{
            right: 0;
        }

        td{
            padding-bottom: 15px;
        }

        form{
            display: inline-block;
        }

        #modal {
            display: inline-block;
        }

    </style>

    <table>
        <tbody>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th></th>

            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    <strong>{{ $user->name }}</strong>
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->type }}
                </td>
                <td>
                    <div id="modal" class="container-top-menu-panel">
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalCoustumerUpdate">Editar</a>
                    </div>
                    <div class="modal fade" id="modalCoustumerUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">

                            {!! Form::open(['route' => ['coustumer.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Actualizar Usuario</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Nombre</label>

                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control" id="name" placeholder="Ingresa el nuevo nombre de usuario"
                                                   required>
                                        </div>

                                        <label for="title" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input name="email" type="email" class="form-control" id="email" placeholder="Ingresa el nuevo email"
                                                   required>
                                        </div>

                                        <label for="title" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input name="password" type="password" class="form-control" id="password" placeholder="Ingresa el password nuevo"
                                                   required>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    {!! Form::open(['route' => ['coustumer.destroy', $user->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger" role="button">Borrar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection