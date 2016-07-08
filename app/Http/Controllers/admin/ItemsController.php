<?php

namespace App\Http\Controllers\admin;

use App\Categoria;
use App\ImgProduct;
use App\Inventario;
use App\Producto;
use App\Proveedor;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        $proveedoresList = Proveedor::lists('nom_empresa', 'id');
        $categoriasList = Categoria::lists('name', 'id');

        $productosList = Producto::lists('name', 'id');

        return view('admin.panel-items', compact('productos','proveedoresList', 'categoriasList', 'productosList'));
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
        // dd($request->all());

        DB::beginTransaction();
        try {

            $producto = new Producto();

            for ($i = 0; $i < count($request->file('img_name')); $i++) {

                $filePhotoProduct = $request->file('img_name')[$i];

                // Validate if object selected has data
                if ($filePhotoProduct != null) {

                    $namePhotoProduct = 'product-' . \Auth::user()->id . Carbon::now()->second . $filePhotoProduct->getClientOriginalName();
                    \Storage::disk('photo_items')->put($namePhotoProduct, \File::get($filePhotoProduct));

                    if( $i == 0) {
                        $producto->fill($request->all());
                        $producto->img_name = $namePhotoProduct;
                        $producto->save();

                    } else {
                        $imgProduct = new ImgProduct([
                            'img_name'      => $namePhotoProduct,
                            'products_id'   => $producto->id
                        ]);

                        $imgProduct->save();
                    }
                }
            }

            $inventario = new Inventario([
                'products_id'   => $producto->id,
                'precio_venta'  => $request['price'],
                'precio_compra' => $request['precio_compra'],
                'cantidad'      => $request['quantity']
            ]);

            $inventario->save();

            DB::commit();
            Session::flash('message', 'Producto creado y añadido a las compras.');
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
