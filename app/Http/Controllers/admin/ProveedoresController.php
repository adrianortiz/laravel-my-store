<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\Correo;
use CodizerTienda\Direccion;
use CodizerTienda\Proveedor;
use CodizerTienda\Telefono;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proveedores = Proveedor::join('telefonos', 'telefonos.proveedores_id', '=', 'proveedores.id')
          ->join('direcciones', 'direcciones.proveedores_id', '=', 'proveedores.id')
          ->join('correo', 'correo.proveedores_id', '=', 'proveedores.id')
          ->select('*', 'telefonos.num AS num_tel')
          ->get();
        return view('admin.panel-proveedor', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->fill($request->all());
        $proveedor->save();

        $direccion = new Direccion();
        $direccion->fill($request->all());
        $direccion->proveedores_id=$proveedor->id;
        $direccion->desc=$request->desc_dir;
        $direccion->num=$request->num_dir;
        $direccion->save();

        $telefono = new Telefono();
        $telefono->proveedores_id=$proveedor->id;
        $telefono->desc=$request->desc_tel;
        $telefono->num=$request->num_tel;
        $telefono->save();

        $correo = new Correo();
        $correo->fill($request->all());
        $correo->proveedores_id=$proveedor->id;
        $correo->desc=$request->desc_mail;
        $correo->save();

        return \Redirect::route('admin.proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
