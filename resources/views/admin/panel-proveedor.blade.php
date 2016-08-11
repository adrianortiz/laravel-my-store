@extends('admin.layout-panel')

@section('title', 'Panel Proveedor')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Proveedores
            <small>Panel</small>
        </h1>
    </div>

    <div class="container-top-menu-panel">
        <a href="#0" class="btn btn-info" data-toggle="modal" data-target="#modalProveedor">Nuevo proveedor</a>
    </div>

    @include('admin.partials.messages')

            <!-- Table Proveedores -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Empresa</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($proveedores as $proveedor)
                        <tr data-proveedor="{{ $proveedor -> id }}">
                            <td width="60">
                                <img src="{{ asset('media/icon/proveedor.png') }}" alt="Foto de proveedor" width="54"
                                     height="auto">
                            </td>
                            <td>
                                <div>{{ $proveedor -> nom_empresa }} </div>
                            </td>
                            <td>
                                <div>{{ $proveedor -> nom_contacto. ' ' .$proveedor -> ap_paterno }} </div>
                            </td>
                            <td>
                                <p>{{ $proveedor -> num_tel}} </p>

                                <p>{{ $proveedor -> correo }} </p>
                            </td>
                            <td width="160">
                                <div class="btn-group" role="group" aria-label="...">
                                    <button type="button" class="btn btn-default btn-edit">Editar</button>
                                    <button type="button" class="btn btn-danger btn-delete">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                <div>No hay proveedores</div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Help section -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="bs-example" data-example-id="media-alignment">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#0">
                            <img class="media-object" data-src="holder.js/64x64" alt="64x64"
                                 src="{{ asset('media/icon/help.png') }}" data-holder-rendered="true" width="64"
                                 height="64">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Ayuda</h4>

                        <p>Gestiona las proveedores que proveen de productos.
                            Para poder registrar un producto es necesario primero tener un proveedor.
                            <br/>Toda la inforamción de sus proveedores podran ser consultadas en esta página.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modals -->
<!-- Create -->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        {!! Form::open(['route' => 'admin.proveedores.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nuevo Proveedor</h4>
            </div>

            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab"
                                                              data-toggle="tab">Información.</a></li>
                    <li role="presentation"><a href="#dir" aria-controls="dir" role="tab"
                                               data-toggle="tab">Dirección.</a>
                    </li>
                    <li role="presentation"><a href="#tel" aria-controls="tel" role="tab"
                                               data-toggle="tab">Teléfono.</a>
                    </li>
                    <li role="presentation"><a href="#mail" aria-controls="mail" role="tab"
                                               data-toggle="tab">Correo.</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <!-- Tab General Information -->
                    <div role="tabpanel" class="tab-pane active" id="info">
                        <p>

                        <div class="form-group">
                            <label for="nom_empresa" class="col-sm-2 control-label">Nombre empresa</label>

                            <div class="col-sm-10">
                                {!! Form::text('nom_empresa', old('nom_empresa'), ['id' => 'nom_empresa', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nom_contacto" class="col-sm-2 control-label">Nombre:</label>

                            <div class="col-sm-10">
                                {!! Form::text('nom_contacto', old('nom_contacto'), ['id' => 'nom_contacto', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ap_paterno" class="col-sm-2 control-label">Apellido Paterno:</label>

                            <div class="col-sm-10">
                                {!! Form::text('ap_paterno', old('ap_paterno'), ['id' => 'ap_paterno', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ap_materno" class="col-sm-2 control-label">Apellido Materno:</label>

                            <div class="col-sm-10">
                                {!! Form::text('ap_materno', old('ap_materno'), ['id' => 'ap_materno', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Addres -->
                    <div role="tabpanel" class="tab-pane" id="dir">
                        <p>

                        <div class="form-group">
                            <label for="desc_dir" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_dir', old('desc_dir'), ['id' => 'desc_dir', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estado" class="col-sm-2 control-label">Estado:</label>

                            <div class="col-sm-10">
                                {!! Form::text('estado', old('estado'), ['id' => 'estado', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="municipio" class="col-sm-2 control-label">Municipio:</label>

                            <div class="col-sm-10">
                                {!! Form::text('municipio', old('municipio'), ['id' => 'municipio', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="colonia" class="col-sm-2 control-label">Colonia:</label>

                            <div class="col-sm-10">
                                {!! Form::text('colonia', old('colonia'), ['id' => 'colonia', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="calle" class="col-sm-2 control-label">Calle:</label>

                            <div class="col-sm-10">
                                {!! Form::text('calle', old('calle'), ['id' => 'calle', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_dir" class="col-sm-2 control-label">Número:</label>

                            <div class="col-sm-10">
                                {!! Form::number('num_dir', old('num_dir'), ['id' => 'num_dir', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cp" class="col-sm-2 control-label">Codigo Postal:</label>

                            <div class="col-sm-10">
                                {!! Form::number('cp', old('cp'), ['id' => 'cp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Phone -->
                    <div role="tabpanel" class="tab-pane" id="tel">
                        <p>

                        <div class="form-group">
                            <label for="desc_tel" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_tel', old('desc_tel'), ['id' => 'desc_tel', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_tel" class="col-sm-2 control-label">Número:</label>

                            <div class="col-sm-10">
                                {!! Form::number('num_tel', old('num_tel'), ['id' => 'num_tel', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Mail -->
                    <div role="tabpanel" class="tab-pane" id="mail">
                        <p>

                        <div class="form-group">
                            <label for="desc_mail" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_mail', old('desc_mail'), ['id' => 'desc_mail', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo" class="col-sm-2 control-label">Correo:</label>

                            <div class="col-sm-10">
                                {!! Form::email('correo', old('correo'), ['id' => 'correo', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
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
<!-- Delete -->
<div class="modal fade bs-example-modal-sm" id="modalDelete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Eliminar</h4>
            </div>
            <div class="modal-body">
                <p class="text-danger">¿Estás seguro de esta realizar esta acción?</p>

                <p>Si elimina a este proveedor, se eliminará toda la información relacionada.</p>
                <b>Esta acción no se puede revertir.</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btn-eliminar">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Update And Select -->
<div class="modal fade" id="modalUpProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        {!! Form::open(['route' => 'admin.proveedores.update', 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-edit']) !!}
        {!! Form::hidden('idUp', old('idUp'), ['id' => 'idUp']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar Proveedor</h4>
            </div>

            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#infoUp" aria-controls="infoUp" role="tab"
                                                              data-toggle="tab">Información.</a></li>
                    <li role="presentation"><a href="#dirUp" aria-controls="dirUp" role="tab"
                                               data-toggle="tab">Dirección.</a>
                    </li>
                    <li role="presentation"><a href="#telUp" aria-controls="telUp" role="tab"
                                               data-toggle="tab">Teléfono.</a>
                    </li>
                    <li role="presentation"><a href="#mailUp" aria-controls="mailUp" role="tab"
                                               data-toggle="tab">Correo.</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">

                    <!-- Tab General Information -->
                    <div role="tabpanel" class="tab-pane active" id="infoUp">
                        <p>

                        <div class="form-group">
                            <label for="nom_empresaUp" class="col-sm-2 control-label">Nombre empresa</label>

                            <div class="col-sm-10">
                                {!! Form::text('nom_empresaUp', old('nom_empresaUp'), ['id' => 'nom_empresaUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nom_contactoUp" class="col-sm-2 control-label">Nombre:</label>

                            <div class="col-sm-10">
                                {!! Form::text('nom_contactoUp', old('nom_contactoUp'), ['id' => 'nom_contactoUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ap_paternoUp" class="col-sm-2 control-label">Apellido Paterno:</label>

                            <div class="col-sm-10">
                                {!! Form::text('ap_paternoUp', old('ap_paternoUp'), ['id' => 'ap_paternoUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ap_maternoUp" class="col-sm-2 control-label">Apellido Materno:</label>

                            <div class="col-sm-10">
                                {!! Form::text('ap_maternoUp', old('ap_maternoUp'), ['id' => 'ap_maternoUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Addres -->
                    <div role="tabpanel" class="tab-pane" id="dirUp">
                        <p>

                        <div class="form-group">
                            <label for="desc_dirUp" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_dirUp', old('desc_dirUp'), ['id' => 'desc_dirUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estadoUp" class="col-sm-2 control-label">Estado:</label>

                            <div class="col-sm-10">
                                {!! Form::text('estadoUp', old('estadoUp'), ['id' => 'estadoUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="municipioUp" class="col-sm-2 control-label">Municipio:</label>

                            <div class="col-sm-10">
                                {!! Form::text('municipioUp', old('municipioUp'), ['id' => 'municipioUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="coloniaUp" class="col-sm-2 control-label">Colonia:</label>

                            <div class="col-sm-10">
                                {!! Form::text('coloniaUp', old('coloniaUp'), ['id' => 'coloniaUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="calleUp" class="col-sm-2 control-label">Calle:</label>

                            <div class="col-sm-10">
                                {!! Form::text('calleUp', old('calleUp'), ['id' => 'calleUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_dirUp" class="col-sm-2 control-label">Número:</label>

                            <div class="col-sm-10">
                                {!! Form::number('num_dirUp', old('num_dirUp'), ['id' => 'num_dirUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpUp" class="col-sm-2 control-label">Codigo Postal:</label>

                            <div class="col-sm-10">
                                {!! Form::number('cpUp', old('cpUp'), ['id' => 'cpUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Phone -->
                    <div role="tabpanel" class="tab-pane" id="telUp">
                        <p>

                        <div class="form-group">
                            <label for="desc_telUp" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_telUp', old('desc_telUp'), ['id' => 'desc_telUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_telUp" class="col-sm-2 control-label">Número:</label>

                            <div class="col-sm-10">
                                {!! Form::number('num_telUp', old('num_telUp'), ['id' => 'num_telUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>

                    <!-- Mail -->
                    <div role="tabpanel" class="tab-pane" id="mailUp">
                        <p>

                        <div class="form-group">
                            <label for="desc_mailUp" class="col-sm-2 control-label">Descripción:</label>

                            <div class="col-sm-10">
                                {!! Form::text('desc_mailUp', old('desc_mailUp'), ['id' => 'desc_mailUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correoUp" class="col-sm-2 control-label">Correo:</label>

                            <div class="col-sm-10">
                                {!! Form::email('correoUp', old('correoUp'), ['id' => 'correoUp', 'class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Forms -->
<!-- Eliminar -->
{!! Form::open(['route' => ['admin.proveedores.destroy', 'IDDel'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
{!! Form::close() !!}
        <!-- Show -->
{!! Form::open(['route' => ['admin.proveedores.show', 'IDShow'], 'method' => 'GET', 'id' => 'form-show']) !!}
{!! Form::close() !!}
@endsection

@section('extra-scripts')
    <script>$('header div ul li:nth-child(4) a').addClass('active-menu');</script>
    <script src=" {{ asset('js/panel-proveedor.js') }}"></script>
@endsection