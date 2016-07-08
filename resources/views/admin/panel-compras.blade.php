@extends('admin.layout-panel')

@section('title', 'Panel Compras')

@section('content')

<!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Compras
            <small>Panel</small>
        </h1>
    </div>

    <div class="container-top-menu-panel">
        <a href="#0" class="btn btn-info" data-toggle="modal" data-target="#modalSlider">Nuevo</a>
    </div>

    @include('admin.partials.messages')

    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Otra cosa</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td width="60">
                            <img src="{{ asset('media/icon/proveedor.png') }}" alt="Foto de proveedor" width="54" height="auto">
                        </td>
                        <td>
                            <p>Hola a todos</p>
                            <p>Hola a todos otra vez</p>
                        </td>
                        <td>
                            <ul>
                                <li>Telefono 1: 23423423</li>
                                <li>Telefono 2: 23423423</li>
                            </ul>
                        </td>
                        <td>Otto</td>
                        <td width="160">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default">Editar</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('media/icon/proveedor.png') }}" alt="Foto de proveedor" width="54" height="auto">
                        </td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>Otto</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default">Editar</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('media/icon/proveedor.png') }}" alt="Foto de proveedor" width="54" height="auto">
                        </td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>the Bird</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default">Editar</button>
                                <button type="button" class="btn btn-danger">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-sm-12 col-md-12">
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
                    <p>Gestiona los productos de tu tienda, recurda que los proveedores y categorías se gestionan en sus respectivas vistas.</p>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        {!! Form::open(['route' => 'admin.slider.store', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo producto</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Título</label>

                    <div class="col-sm-10">
                        <input name="title" type="text" class="form-control" id="title" placeholder="Ingresa un título"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dec" class="col-sm-2 control-label">Descripción</label>

                    <div class="col-sm-10">
                        <textarea name="dec" class="form-control" rows="3" id="dec"
                                  placeholder="Ingresa una descripción" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc" class="col-sm-2 control-label">Imagen</label>

                    <div class="col-sm-10">
                        {!! Form::file('img_name', ['accept' => 'image/jpg,image/png', 'id' => 'img_name', 'class' => 'form-control', 'required']) !!}
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


@endsection

@section('extra-scripts')
    <script>$('header div ul li:nth-child(3) a').addClass('active-menu');</script>
    <!-- <script src=" {{ asset('js/panel-slider.js') }}"></script> -->
@endsection
