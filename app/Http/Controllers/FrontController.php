<?php

namespace CodizerTienda\Http\Controllers;

use CodizerTienda\Categoria;
use CodizerTienda\Producto;
use CodizerTienda\Slider;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->orderBy('products.id', 'desc')
            ->get();

        $sliders = Slider::all();

        $categorias = Categoria::all();
        return view('index', compact('sliders', 'productos', 'categorias'));
    }
}
