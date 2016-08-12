@extends('admin.layout-panel')

@section('title', 'Panel Categories')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">

    <div class="page-header">
        <h1>Categorias
            <small>Panel</small>
        </h1>
    </div>

    <div class="container-top-menu-panel">
        <a href="#0" class="btn btn-info" data-toggle="modal" data-target="#modalCategories">Nueva categoria</a>
    </div>

    @include('admin.partials.messages')


    <div class="row">

        @foreach($categorias as $categoria)
            <div class="col-sm-6 col-md-3 containerId" data-categoria="{{$categoria->id}}">
                <div class="thumbnail" data-categoria="{{$categoria->id}}">
                    <img data-src="holder.js/100%x200" alt="100%x200" src="{{ asset('media/icon/category-2.png') }}"
                         data-holder-rendered="true" style="width: 100%; height: auto; display: block;">

                    <div class="caption"><h3>{{$categoria->name}}</h3>

                        <p>Categoria</p>

                        <p>
                            {!! Form::open(['route' => ['admin.categorias.destroy', $categoria->id], 'method' => 'DELETE']) !!}
                            <button type="button" class="btn btn-info btn-edit">Editar</button>
                            <button type="submit" class="btn btn-danger" role="button">Eliminar</button>
                            {!! Form::close() !!}
                        </p>
                    </div>
                </div>
            </div>

        @endforeach

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

                <p>Gestiona las categorias de los productos de tu tienda.
                    Tenga en cuenta que solo se puede agregar una categoria a un producto.</p>
            </div>
        </div>
    </div>
</div>



        <!-- Modal_Update -->
<div class="modal fade" id="modalCategoriesUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        {!! Form::open(['route' => 'admin.categorias.update', 'method' => 'PUT', 'id' => 'form-edit', 'class' => 'form-horizontal']) !!}
        {!! Form::hidden('idUp', old('idUp'), ['id' => 'idUp']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Actualizar Categoria</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Categoria</label>

                    <div class="col-sm-10">
                        {!! Form::text('name', old('name'), ['id' => 'idName', 'class' => 'form-control', 'required']) !!}
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



        <!-- Modal INSERT-->
<div class="modal fade" id="modalCategories" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        {!! Form::open(['route' => 'admin.categorias.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Nueva Categoria</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Categoria</label>

                    <div class="col-sm-10">
                        <input name="name" type="text" class="form-control" id="name"
                               placeholder="Ingresa el nombre de la categoria"
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

{!! Form::open(['route' => ['admin.categorias.show', 'IDShow'], 'method' => 'GET', 'id' => 'form-show']) !!}
{!! Form::close() !!}
@endsection

@section('extra-scripts')
    <script>$('header div ul li:nth-child(5) a').addClass('active-menu');</script>
    <script src=" {{ asset('js/panel-categoria.js') }}"></script>
@endsection
