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
        <a href="{{ route('admin.items') }}" class="btn btn-info">Gestionar productos</a>
    </div>

    @include('admin.partials.messages')

    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Información de la compra</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($inventarios as $inventario)
                        <tr>
                            <td width="60">
                                <div class="img-preview-mini" style="background-image: url('{{ asset('media/photo-items/' . $inventario->img_name) }}')">

                                </div>
                            </td>
                            <td>

                                <ul style="list-style: none; padding: 0;">
                                    <li><h4>{{ $inventario->name }}</h4></li>
                                    <li>{{ $inventario->updated_at }}</li>
                                    <li><p>{{ $inventario->desc }}</p></li>
                                    <li><kbd>{{ $inventario->quantity }}pz.</kbd> <code>${{ $inventario->price }}</code></li>
                                    <li>Oferta: -{{ $inventario->offert }}%</li>
                                </ul>
                            </td>
                            <td>
                                <ul style="list-style: none; padding: 0;">
                                    <li><h5>Cantidad</h5></li>
                                    <li><kbd>{{ $inventario->cantidad }}pz.</kbd></li>

                                    <li><h5>Precio compra</h5></li>
                                    <li><kbd>${{ $inventario->precio_compra }}</kbd></li>

                                    <li><h5>Gasto total</h5></li>
                                    <li><code>${{ ($inventario->cantidad * $inventario->precio_compra) }}</code></li>

                                </ul>
                            </td>
                        </tr>
                    @endforeach

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
                    <p>Toma el control de tu tienda y no dejes que nada se te escape.</p>
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
