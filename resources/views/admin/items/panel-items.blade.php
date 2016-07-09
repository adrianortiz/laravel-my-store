@extends('admin.layout-panel')

@section('title', 'Panel Productos')

@section('content')

<!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Productos
            <small>Panel</small>
        </h1>
    </div>

    <div class="container-top-menu-panel">
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalNewCompra">Añadir compra</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalNewProduct">Nuevo</button>
        </div>
    </div>

    @include('admin.partials.messages')

    <div class="row">

        <div class="col-sm-12 col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Producto</th>
                        <th>Detalles</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody id="list-products">

                    @foreach($productos as $producto)
                    <tr>
                        <td width="60">
                            <div class="img-preview-mini" style="background-image: url('{{ asset('media/photo-items/' . $producto->img_name) }}')">

                            </div>
                        </td>
                        <td>

                            <ul style="list-style: none; padding: 0;">
                                <li><h4>{{ $producto->name }}</h4></li>
                                <li>{{ $producto->desc }}</li>
                                <li><kbd>{{ $producto->quantity }}pz.</kbd> <code>${{ $producto->price }}</code></li>
                                <li>Oferta: -{{ $producto->offert }}%</li>
                            </ul>
                        </td>
                        <td>
                            <ul style="list-style: none; padding: 0;">
                                <li><h5>Categoría</h5></li>
                                <li>{{ $producto->name_category }}</li>
                                <li><h5>Proveedor</h5></li>
                                <li>{{ $producto->nom_empresa }}</li>

                                @if($producto->available == 1)
                                    <li><kbd>Ver en tienda</kbd></li>
                                @else
                                    <li><code>No ver en tienda</code></li>
                                @endif
                            </ul>
                        </td>
                        <td width="160">
                            <div class="btn-group" role="group" aria-label="...">
                                <button type="button" class="btn btn-default">Ver</button>
                                <button type="button" class="btn btn-default btn-item-show" data-product="{{ $producto->producto_id }}"  data-toggle="modal" data-target="#modalUpdateProduct">Editar</button>
                            </div>
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
                    <p>Gestiona los productos de tu tienda, recuerda que los proveedores y categorías se gestionan en sus respectivas vistas.</p>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>


{!! Form::open(['route' => 'admin.items.show', 'method' => 'GET', 'id' => 'form-products-to-show']) !!}
    {!! Form::hidden('id',0, ['id' => 'id-product-to-show']) !!}
{!! Form::close() !!}

@include('admin.items.partials.modal-store-items')
@include('admin.items.partials.modal-update-items')
@include('admin.items.partials.panel-modal-compra')

@endsection

@section('extra-scripts')
    <script>$('header div ul li:nth-child(2) a').addClass('active-menu');</script>
    <script src=" {{ asset('js/panel-items.js') }}"></script>
@endsection
