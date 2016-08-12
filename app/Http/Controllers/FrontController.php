<?php

namespace CodizerTienda\Http\Controllers;

use CodizerTienda\Categoria;
use CodizerTienda\ImgProduct;
use CodizerTienda\Producto;
use CodizerTienda\Slider;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use Illuminate\Support\Facades\URL;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        $sliders = Slider::all();

        $categorias = Categoria::all();
        return view('index', compact('sliders', 'productos', 'categorias'));
    }

    public function showItems($id, $slug)
    {

        $productos = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->where('products.available', 1)
            ->where('products.id', $id)
            ->first();

        $images = ImgProduct::where('products_id', $id)->get();

        $ofertas = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        $categorias = Categoria::all();

        $relacionados = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category', 'products.id AS relacionado_id')
            ->orderBy('products.id', 'desc')
            ->where('products.available', 1)
            ->where('products.id', '<>', $id)
            ->where('categories.name', $productos->name_category)
            ->get();

        return view('store-product', compact('productos', 'categorias', 'ofertas', 'images', 'relacionados'));
    }

    public function showItemsByCategory($id, $slug)
    {

        $productos = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->where('products.available', 1)
            ->where('categories_id', $id)
            ->get();


        $ofertas = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        $categorias = Categoria::all();

        return view('store-categories', compact('productos', 'categorias', 'ofertas'));
    }

    public function buscador(Request $request)
    {
        $productos = Producto::join('categories', 'products.categories_id', '=', 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->where('products.name', 'LIKE', '%' . $request->buscar . '%')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        return response()->json([
           'productos' => $productos,
            'url' => URL::to('/') .'/item/'
        ]);
    }
}
