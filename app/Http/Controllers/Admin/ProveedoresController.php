<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\Correo;
use CodizerTienda\Direccion;
use CodizerTienda\Proveedor;
use CodizerTienda\Telefono;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $proveedor = new Proveedor();
            $proveedor->fill($request->all());
            $proveedor->save();

            $direccion = new Direccion();
            $direccion->fill($request->all());
            $direccion->proveedores_id = $proveedor->id;
            $direccion->desc = $request->desc_dir;
            $direccion->num = $request->num_dir;
            $direccion->save();

            $telefono = new Telefono();
            $telefono->proveedores_id = $proveedor->id;
            $telefono->desc = $request->desc_tel;
            $telefono->num = $request->num_tel;
            $telefono->save();

            $correo = new Correo();
            $correo->fill($request->all());
            $correo->proveedores_id = $proveedor->id;
            $correo->desc = $request->desc_mail;
            $correo->save();

            DB::commit();
            return \Redirect::route('admin.proveedores');
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('message', 'La categoría ha sido asignada y no puede eliminarse');
            return \Redirect::route('admin.proveedores');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Proveedor::join('telefonos', 'telefonos.proveedores_id', '=', 'proveedores.id')
            ->join('direcciones', 'direcciones.proveedores_id', '=', 'proveedores.id')
            ->join('correo', 'correo.proveedores_id', '=', 'proveedores.id')
            ->where('proveedores.id', $id)
            ->select('*', 'telefonos.num AS num_tel', 'direcciones.num AS num_dir', 'direcciones.desc AS desc_dir', 'telefonos.desc AS desc_tel', 'correo.desc AS desc_mail')
            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->idUp;

        DB::beginTransaction();
        try {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->nom_empresa = $request->nom_empresaUp;
            $proveedor->nom_contacto = $request->nom_contactoUp;
            $proveedor->ap_paterno = $request->ap_paternoUp;
            $proveedor->ap_materno = $request->ap_maternoUp;
            $proveedor->save();

            $direccionId = Direccion::where('proveedores_id', $id)->select('id')->first();
            $direccion = Direccion::findOrFail($direccionId->id);
            $direccion->desc = $request->desc_dirUp;
            $direccion->estado = $request->estadoUp;
            $direccion->municipio = $request->municipioUp;
            $direccion->colonia = $request->coloniaUp;
            $direccion->calle = $request->calleUp;
            $direccion->num = $request->num_dirUp;
            $direccion->cp = $request->cpUp;
            $direccion->proveedores_id = $proveedor->id;
            $direccion->save();

            $telefonoId = Telefono::where('proveedores_id', $id)->select('id')->first();
            $telefono = Telefono::findOrFail($telefonoId->id);
            $telefono->desc = $request->desc_telUp;
            $telefono->num = $request->num_telUp;
            $telefono->proveedores_id = $proveedor->id;
            $telefono->save();

            $correoId = Correo::where('proveedores_id', $id)->select('id')->first();
            $correo = Correo::findOrFail($correoId->id);
            $correo->fill($request->all());
            $correo->desc = $request->desc_mailUp;
            $correo->correo = $request->correoUp;
            $correo->proveedores_id = $proveedor->id;
            $correo->save();

            DB::commit();
            return \Redirect::route('admin.proveedores');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', 'Ocurrio un problema ' . $e->getMessage());
            return \Redirect::route('admin.proveedores');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $message = null;
        DB::beginTransaction();
        try {
            $direccion = Direccion::where('proveedores_id', $id)->select('id')->get();
            Direccion::destroy($direccion[0]->id);

            $telefono = Telefono::where('proveedores_id', $id)->select('id')->get();
            Telefono::destroy($telefono[0]->id);

            $correo = Correo::where('proveedores_id', $id)->select('id')->get();
            Correo::destroy($correo[0]->id);

            $proveedor = Proveedor::findOrFail($id);
            $proveedor->delete();

            DB::commit();

            $message = 'Proveedor eliminado.';
        } catch (\Exception $e) {
            DB::rollback();
            return 'Ocurrio un problema';
        }
        if ($request->ajax()) {
            return $message;
        }
        Session::flash('message', $message);
        return Redirect::route('admin.proveedores');
    }

}