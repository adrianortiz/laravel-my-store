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
                    {!! Form::open(['route' => ['coustumer.edit', $user->id], 'method' => 'GET']) !!}
                    <button type="submit" class="btn btn-info" role="button">Editar</button>
                    {{--<input type="hidden" value="$user->id">--}}
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['coustumer.destroy', $user->id], 'method' => 'DELETE']) !!}
                    <button type="submit" class="btn btn-danger" role="button">Borrar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection