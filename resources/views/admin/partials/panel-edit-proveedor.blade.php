@extends('admin.layout-panel')

@section('title', 'Panel Proveedor')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Editar
            <small>{{ $proveedor->nom_contacto. ' ' .$proveedor->ap_paterno }}</small>
        </h1>
    </div>


    @include('admin.partials.messages')
    @if(! $errors->isEmpty())
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4>Corrige los siguientes campos</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

            <!-- Table Proveedores -->
    <div class="row">
        <div class="col-sm-12 col-md-12">
                {!! Form::model($proveedor, ['route' => ['admin.proveedores.update', $proveedor], 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-edit']) !!}

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
                                    <label for="nom_empresa" class="col-sm-2 control-label">Nombre empresa</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('nom_empresa', old('nom_empresa'), ['id' => 'nom_empresa', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nom_contactoUp" class="col-sm-2 control-label">Nombre:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('nom_contacto', old('nom_contacto'), ['id' => 'nom_contacto', 'class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ap_paterno" class="col-sm-2 control-label">Apellido Paterno:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('ap_paterno', old('ap_paterno'), ['id' => 'ap_paterno', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ap_materno" class="col-sm-2 control-label">Apellido Materno:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('ap_materno', old('ap_materno'), ['id' => 'ap_materno', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                </p>
                            </div>

                            <!-- Addres -->
                            <div role="tabpanel" class="tab-pane" id="dirUp">
                                <p>

                                <div class="form-group">
                                    <label for="desc_dir" class="col-sm-2 control-label">Descripción:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('desc_dir', old('desc_dir'), ['id' => 'desc_dir', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="estado" class="col-sm-2 control-label">Estado:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('estado', old('estado'), ['id' => 'estado', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="municipio" class="col-sm-2 control-label">Municipio:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('municipio', old('municipio'), ['id' => 'municipio', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="colonia" class="col-sm-2 control-label">Colonia:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('colonia', old('colonia'), ['id' => 'colonia', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="calle" class="col-sm-2 control-label">Calle:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('calle', old('calle'), ['id' => 'calle', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="num_dir" class="col-sm-2 control-label">Número:</label>

                                    <div class="col-sm-10">
                                        {!! Form::number('num_dir', old('num_dir'), ['id' => 'num_dir', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cp" class="col-sm-2 control-label">Codigo Postal:</label>

                                    <div class="col-sm-10">
                                        {!! Form::number('cp', old('cp'), ['id' => 'cpUp', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                </p>
                            </div>

                            <!-- Phone -->
                            <div role="tabpanel" class="tab-pane" id="telUp">
                                <p>

                                <div class="form-group">
                                    <label for="desc_tel" class="col-sm-2 control-label">Descripción:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('desc_tel', old('desc_tel'), ['id' => 'desc_tel', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="num_tel" class="col-sm-2 control-label">Número:</label>

                                    <div class="col-sm-10">
                                        {!! Form::number('num_tel', old('num_tel'), ['id' => 'num_tel', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                </p>
                            </div>

                            <!-- Mail -->
                            <div role="tabpanel" class="tab-pane" id="mailUp">
                                <p>

                                <div class="form-group">
                                    <label for="desc_mail" class="col-sm-2 control-label">Descripción:</label>

                                    <div class="col-sm-10">
                                        {!! Form::text('desc_mail', old('desc_mail'), ['id' => 'desc_mail', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="col-sm-2 control-label">Correo:</label>

                                    <div class="col-sm-10">
                                        {!! Form::email('correo', old('correo'), ['id' => 'correo', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="{{ route('admin.proveedores') }}" class="btn btn-default">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                {!! Form::close() !!}
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
@endsection