@extends('layouts.app')

@section('title', 'Panel usuario')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Usuario
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

        #buttons a{
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
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th id="act">Actions</th>
            </tr>
            </thead>
                <tbody>
                <tr>
                    <td>
                        {{ $user[0]->name }}
                    </td>
                    <td>
                        {{ $user[0]->email }}
                    </td>
                    <td>
                        {{ $user[0]->type }}
                    </td>
                    <td>
                        <div id="buttons">
                            <a class="btn btn-info" href="{{ route('client.edit') }}">Editar</a>
                        </div>

                    </td>
                </tr>

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
