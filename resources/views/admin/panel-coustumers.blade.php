@extends('admin.layout-panel')

@section('title', 'Panel Usuarios')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Usuarios
            <small>Panel</small>
        </h1>
    </div>

    <style>
        div .panel {
            width: 1100px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        button{
            right: 0;
        }

        #buttons form{
            display: inline-block;
            right: 0;
            float: right;
            padding-left: 20px;
        }

        #act{
            text-align: right;
        }
    </style>

    @include('admin.partials.messages')

    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"></div>

        <!-- Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th id="act">Actions</th>
                </tr>
            </thead>

        <?php $acum =0; ?>
        @foreach($users as $user)
            <tbody>
                <tr>
                    <td>
                        {{ $acum = $acum + 1 }}
                    </td>
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
                            {!! Form::open(['route' => ['coustumer.edit', $user->id], 'method' => 'GET']) !!}
                            <input type="hidden" value="$user->id">
                            <button type="submit" class="btn btn-info" role="button">Editar</button>
                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['coustumer.destroy', $user->id], 'method' => 'DELETE']) !!}
                            <button type="submit" class="btn btn-danger" role="button">Borrar</button>
                            {!! Form::close() !!}
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

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

                <p>Gestiona los usuarios de tu tienda.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra-scripts')

    <script>$('header div ul li:nth-child(6) a').addClass('active-menu');</script>

@endsection
