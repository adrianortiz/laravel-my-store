@if(Session::has('message'))
<!-- Begin alert info -->
<div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Mensage!</strong> {{ Session::get('message') }}
</div>
@endif