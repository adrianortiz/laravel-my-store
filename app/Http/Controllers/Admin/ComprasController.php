<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\Inventario;
use CodizerTienda\Producto;
use CodizerTienda\Proveedor;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::join('products', 'inventario.products_id', '=' , 'products.id')
            ->orderBy('inventario.id', 'desc')
            ->select('inventario.*', 'products.*')
            ->get();

        return view('admin.panel-compras', compact('inventarios'));
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
        DB::beginTransaction();
        try {
            $inventario = new Inventario();
            $inventario->fill($request->all());
            $inventario->save();

            $producto = Producto::findOrFail($request['products_id']);
            $producto->price = $request['precio_venta'];
            $producto->quantity = ($producto->quantity + $request['cantidad']);
            $producto->save();

            DB::commit();
            Session::flash('message', 'Su compra se ha añadido a "Compras".');
            return redirect()->route('admin.items');

        } catch (\Exception $e) {
            DB::rollback();

            // dd($e);
            Session::flash('message', 'Ocurrio un error');
            return redirect()->route('admin.items');
        }
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
