@extends('admin.layout-panel')

@section('title', 'Home')

@section('content')

        <!-- Begin page content -->
<div class="container panel-container">
    <div class="page-header">
        <h1>Home <small>Panel</small></h1>
    </div>
    <p>Bienvenido al sistema <code>Codizer Tienda</code>.</p>
    <img src="{{ asset('media/icon/welcome.png') }}" alt="Welcome" width="100%">
</div>

@endsection