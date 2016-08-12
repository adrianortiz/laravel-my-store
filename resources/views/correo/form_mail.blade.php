@extends('layout-store')

@section('title', 'Codizer Tienda')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header"
             style="background-color: #FFFFFF; padding-bottom: 14px; border-bottom: solid 1px #D2D6DE;">
        <h1>
            Correo
            <small>{{ Auth::user()->role }}</small>
        </h1>

        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> - Materias y alumnos</li>
        </ol>

    </section>


    <section class="content">

        @include('admin.config.partials.messages')


    <div class="row">
            
            <div class="col-md-12">
            <form  id="f_enviar_correo" name="f_enviar_correo"  action="{{ url('/enviar_correo') }}"  class="formarchivo" enctype="multipart/form-data" method="post" >

             <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Crear Nuevo Correo</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    
                      <div class="form-group">
                        <input class="form-control" placeholder="Para:" id="destinatario" name="destinatario">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Asunto:" id="asunto" name="asunto">
                      </div>
                      <div class="form-group">
                        <textarea id="contenido_mail" name="contenido_mail" class="form-control" style="height: 200px" placeholder="escriba aquí...">
                         
                        </textarea>
                      </div>

                

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                     
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ENVIAR</button>
                      </div>
                   <br/>
                    </div><!-- /.box-footer -->
                  </div><!-- /. box -->

              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->



    </section>





@endsection



@section('extra-scripts')


    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

    <script>

        function activareditor(){
            $("#contenido_mail").wysihtml5();
        };

        activareditor();
    </script>

@endsection