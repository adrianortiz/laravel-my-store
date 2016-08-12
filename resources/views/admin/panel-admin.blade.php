@extends('admin.layout-panel')

@section('title', 'Panel Administradores')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Administradores
            <small>Panel</small>
        </h1>
    </div>

    <style>
        table{
            width: 1200px;
            margin: 0 auto;
            display: block;
            text-align: center;

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

        #buttons form{
            display: inline-block;
        }
    </style>

    @include('admin.partials.messages')

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
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->type }}
                </td>
                <td>
                    <div id="buttons">
                        {!! Form::open(['route' => ['admin.edit', $user->id], 'method' => 'GET']) !!}
                        <input type="hidden" value="$user->id">
                        <button type="submit" class="btn btn-info" role="button">Editar</button>
                        {!! Form::close() !!}

                        {!! Form::open(['route' => ['admin.destroy', $user->id], 'method' => 'DELETE']) !!}
                        <button type="submit" class="btn btn-danger" role="button">Borrar</button>
                        {!! Form::close() !!}
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="bs-example" data-example-id="media-alignment">
        <div class="media">
            <div class="media-left media-middle">
                <a href="#0">
                    <img class="media-object" data-src="holder.js/64x64" alt="64x64"
                         src="{{ asset('media/icon/help.png') }}" data-holder-rendered="true" width="64" height="64">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Ayuda</h4>

                <p>Gestiona los administradores de tu tienda.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-scripts')

    <script>$('header div ul li:nth-child(7) a').addClass('active-menu');</script>

@endsection
