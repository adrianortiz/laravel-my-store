<?php

namespace CodizerTienda\Http\Controllers\Coustumer;


use CodizerTienda\Producto;
use Illuminate\Http\Request;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CartController extends Controller {

    public function __construct()
    {
        if(!Session::has('cart'))
            Session::put('cart', array());
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Session::forget('cart');

        $tiendaRoute = 'cart';
        $cart = Session::get($tiendaRoute);
        $total = $this->total($tiendaRoute);


        return view('store-cart', compact('cart', 'total'));
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
     * Agregar un producto a la session de carrito
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->ajax()) {
            $product = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
                ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
                ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category', 'products.id AS product_id')
                ->orderBy('products.id', 'desc')
                ->where('products.available', 1)
                ->where('products.id', $request['id'])
                ->first();

            $cart = Session::get('cart');

            if (array_key_exists($product->product_id, $cart))
                $product->quantity = ($cart[$product->product_id]->quantity + $request['cantidad']);
            else
                $product->quantity = $request['cantidad'];


            $porcentaje = $product->offert / 100;
            $valor = $product->price * $porcentaje;
            $product->final_price = (double)($product->price - $valor);

            $cart[$product->product_id] = $product;
            Session::put('cart', $cart);

            return response()->json([
                'message' => 'Se añadio 1 pieza a su carrito',
                'piezas' => '1'
            ]);

        }

        abort(404);

    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function storeByNumber(Request $request)
    {

        $product = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category', 'products.id AS product_id')
            ->orderBy('products.id', 'desc')
            ->where('products.available', 1)
            ->where('products.id', $request['id'])
            ->first();

        $cart = Session::get('cart');

        if (array_key_exists($product->product_id, $cart))
            $product->quantity = ($cart[$product->product_id]->quantity + $request['cantidad']);
        else
            $product->quantity = $request['cantidad'];


        $porcentaje = $product->offert / 100;
        $valor = $product->price * $porcentaje;
        $product->final_price = (double)($product->price - $valor);

        $cart[$product->product_id] = $product;
        Session::put('cart', $cart);


        return Redirect::back()->with('message','Cantidad del Item actualizado.');

    }

    /**
     * Update quantity of exist product cart list
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {

        // dd($request->all());

        $product = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category', 'products.id AS product_id')
            ->orderBy('products.id', 'desc')
            ->where('products.available', 1)
            ->where('products.id', $request['id'])
            ->first();

        $cart = Session::get('cart');
        $cart[$request['id']]->quantity = $request['cantidad'];
        Session::put('cart', $cart);

        return Redirect::back()->with('message','Cantidad del Item actualizado.');
    }



    /**
     * Genera el precio total a pagar, en base a la cantidad
     * de productos en el carrito, su precio y cantidad de
     * los mismos
     *
     * @return int
     */
    private function total($tiendaRoute)
    {
        $cart = Session::get($tiendaRoute);
        $total = 0;
        foreach( $cart as $item ) {
            $total += $item->final_price * $item->quantity;
        }

        return $total;
    }


    /**
     * Elimina el carrito de compra de una sessión
     */
    public function trash(Request $request)
    {
        Session::forget('cart');
        return Redirect::back()->with('message','Items eliminados de la lista.');
    }


    /**
     * Delete a producto from cart
     * @param Request $request
     */
    public function delete(Request $request)
    {

        $cart = Session::get('cart');
        unset($cart[$request['id']]);
        Session::put('cart', $cart);

        return Redirect::back()->with('message','Item eliminado de la lista.');
    }



    public function orderDetail(Request $request)
    {
        if(count(Session::get('cart')) <= 0 ) {
            abort(404);
        }

        $pago = $request['pago'];

        $cart = Session::get('cart');
        // dd($cart);
        $total = $this->total('cart');

        return view('store-order-detail', compact('tienda', 'userContacto', 'userPerfil', 'cart', 'total', 'pago'));
    }
}
