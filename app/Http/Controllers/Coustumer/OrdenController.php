<?php

namespace CodizerTienda\Http\Controllers\Coustumer;

use CodizerTienda\Producto;
use CodizerTienda\Users_has_ventas;
use CodizerTienda\Ventas;
use CodizerTienda\Ventas_has_products;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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


    public function postPaymentCard(Request $request) {


        // dd($request->all());

        DB::beginTransaction();
        try {

            $this->saveVenta($request, 'cart');
            $this->sentMail($request['mail_user']);

            DB::commit();
            return redirect()->route('store.index')->with('message','Venta realizada correctamente.');

        } catch (\Exception $e ) {
            DB::rollback();
            return redirect()->route('store.index')->with('message','Parece que ocurrio un error.');
        }
    }


    /**
     * Enviar mail
     * @param $correo
     */
    public function sentMail($correo) {
        $asunto = "Compra realizada";
        $destinatario = $correo;
        $pathToFile = "";
        $containfile = false;
        $contenido = "Haz realizado una compra con exito desde Codizer Tienda";

        $data = array('contenido' => $contenido);

            $r = Mail::send('correo.plantilla_correo', $data, function ($message) use ($asunto, $destinatario, $containfile, $pathToFile) {
                $message->from('angelpema1994@gmail.com', 'angel7011');
                $message->to($destinatario)->subject($asunto);

        });
    }
    public function saveVenta(Request $request, $storeRoute) {
        $subtotal = 0;
        $cart = Session::get($storeRoute);
        $shipping = 0;

        foreach( $cart as $item ) {
            $subtotal += $item->final_price * $item->quantity;
        }

        $venta = new Ventas([
            'total'         => $subtotal,
        ]);
        $venta->save();

        $userHasVentas = new Users_has_ventas([
            'users_id'          => \Auth::user()->id,
            'ventas_id'         => $venta->id,
            'user_direccion_id'  => 1,
        ]);
        $userHasVentas->save();

        foreach( $cart as $item) {
            $this->saveOrdenDetalle($venta->id, $item);
        }

        Session::forget($storeRoute);
    }


    /**
     * Almacena una orden
     *
     * @param $ventaId
     * @param $item
     */
    protected function saveOrdenDetalle($ventaId, $item) {

        // Se decrementa la cantidad del producto sobre la cantidad que se pidio
        Producto::where('id', $item->product_id)->decrement('quantity', $item->quantity);

        $ordenDetalle = new Ventas_has_products([
            'ventas_id'     => $ventaId,
            'products_id'   => $item->product_id,
            'cantidad'      => $item->quantity,
            'precio'        => $item->price,
            'descuento'     => $item->offert
        ]);
        $ordenDetalle->save();

    }
}
