<?php

namespace CodizerTienda\Http\Controllers;

use App\Ventas;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrito = Ventas::
            join('users_has_ventas', 'ventas.id', '=', 'users_has_ventas.ventas_id')
            ->join('ventas_has_products', 'ventas.id', '=', 'ventas_has_products.ventas_id')
            ->select('users_has_ventas.*', 'ventas_has_products.*','ventas.*')
            ->get();

        return view('carrito', compact('carrito'));
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
        $carrito = new Ventas();
        $carrito->fill($request->all());

        if( $carrito->save() ) {
            Session::flash('message', 'Agregado al carrito.');
            return redirect()->route('user.carrito');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
