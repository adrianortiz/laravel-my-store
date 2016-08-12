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
        return view('admin.panel-proveedor', compact('proveedores'), compact('errorsUp'));
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
        $this->validate($request, [
            'nom_empresa' => 'required|max:255',
            'nom_contacto' => 'required|max:255|string',
            'ap_paterno' => 'required|max:255|string',
            'ap_materno' => 'required|max:255|string',

            'desc_dir' => 'required|max:255',
            'estado' => 'required|max:255|string',
            'municipio' => 'required|max:255|string',
            'colonia' => 'required|max:255|string',
            'calle' => 'required|max:255|string',
            'num_dir' => 'required|max:255|numeric',
            'cp' => 'required|min:7|numeric',

            'desc_tel' => 'required|max:255',
            'num_tel' => 'required|numeric',

            'desc_mail' => 'required|max:255',
            'correo' => 'required|email|max:255'
        ]);

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
        $proveedor = Proveedor::join('telefonos', 'telefonos.proveedores_id', '=', 'proveedores.id')
            ->join('direcciones', 'direcciones.proveedores_id', '=', 'proveedores.id')
            ->join('correo', 'correo.proveedores_id', '=', 'proveedores.id')
            ->where('proveedores.id', $id)
            ->select('*', 'telefonos.num AS num_tel', 'direcciones.num AS num_dir', 'direcciones.desc AS desc_dir', 'telefonos.desc AS desc_tel', 'correo.desc AS desc_mail')
            ->first();

        return view('admin.partials.panel-edit-proveedor', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_empresa' => 'required|max:255',
            'nom_contacto' => 'required|max:255|string',
            'ap_paterno' => 'required|max:255|string',
            'ap_materno' => 'required|max:255|string',

            'desc_dir' => 'required|max:255',
            'estado' => 'required|max:255|string',
            'municipio' => 'required|max:255|string',
            'colonia' => 'required|max:255|string',
            'calle' => 'required|max:255|string',
            'num_dir' => 'required|max:255|numeric',
            'cp' => 'required|min:7|numeric',

            'desc_tel' => 'required|max:255',
            'num_tel' => 'required|numeric',

            'desc_mail' => 'required|max:255',
            'correo' => 'required|email|max:255'
        ]);

        DB::beginTransaction();
        try {
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->fill($request->all());
            $proveedor->save();

            $direccionId = Direccion::where('proveedores_id', $id)->select('id')->first();
            $direccion = Direccion::findOrFail($direccionId->id);
            $direccion->desc = $request->desc_dir;
            $direccion->desc = $request->num_dir;
            $direccion->fill($request->all());
            $direccion->proveedores_id = $id;
            $direccion->save();

            $telefonoId = Telefono::where('proveedores_id', $id)->select('id')->first();
            $telefono = Telefono::findOrFail($telefonoId->id);
            $telefono->desc = $request->desc_tel;
            $telefono->num = $request->num_tel;
            $telefono->proveedores_id = $id;
            $telefono->save();

            $correoId = Correo::where('proveedores_id', $id)->select('id')->first();
            $correo = Correo::findOrFail($correoId->id);
            $correo->fill($request->all());
            $correo->desc = $request->desc_mail;
            $correo->proveedores_id = $id;
            $correo->save();

            DB::commit();
            return \Redirect::route('admin.proveedores');
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message', 'Ocurrio un problema ' . $e->getMessage());
            return \Redirect::route('admin.proveedores.edit', $id)->withInput();
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