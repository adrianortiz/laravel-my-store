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
        <a href="#0" class="btn btn-info" data-toggle="modal" data-target="#modalSlider">Nueva categoria</a>
    </div>

    @include('admin.partials.messages')


    <div class="row">

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img data-src="holder.js/100%x200" alt="100%x200" src="{{ asset('media/icon/category-2.png') }}" data-holder-rendered="true" style="width: 100%; height: auto; display: block;">

                <div class="caption"><h3>Nombre de la categoria</h3>
                    <p>Categorias</p>
                    <p>
                        <a href="#" class="btn btn-info" role="button">Button</a>
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img data-src="holder.js/100%x200" alt="100%x200" src="{{ asset('media/icon/category-2.png') }}" data-holder-rendered="true" style="width: 100%; height: auto; display: block;">

                <div class="caption"><h3>Nombre de la categoria</h3>
                    <p>Categorias</p>
                    <p>
                        <a href="#" class="btn btn-info" role="button">Button</a>
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img data-src="holder.js/100%x200" alt="100%x200" src="{{ asset('media/icon/category-2.png') }}" data-holder-rendered="true" style="width: 100%; height: auto; display: block;">

                <div class="caption"><h3>Nombre de la categoria</h3>
                    <p>Categorias</p>
                    <p>
                        <a href="#" class="btn btn-info" role="button">Button</a>
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <img data-src="holder.js/100%x200" alt="100%x200" src="{{ asset('media/icon/category-2.png') }}" data-holder-rendered="true" style="width: 100%; height: auto; display: block;">

                <div class="caption"><h3>Nombre de la categoria</h3>
                    <p>Categorias</p>
                    <p>
                        <a href="#" class="btn btn-info" role="button">Button</a>
                        <a href="#" class="btn btn-default" role="button">Button</a>
                    </p>
                </div>
            </div>
        </div>

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

                <p>Gestiona las imagenes del Slider de tu tienda. Se recomienda subir imagenes con una resolución de
                    <code>880 x 490 pixeles</code>. Tenga en cuenta que las imagenes que no cumplan con está cualidad
                    serán modificadas.</p>
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
                <h4 class="modal-title" id="myModalLabel">Nueva imagen para Slider</h4>
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
    <script>$('header div ul li:nth-child(5) a').addClass('active-menu');</script>
    <!-- <script src=" {{ asset('js/panel-slider.js') }}"></script> -->
@endsection
