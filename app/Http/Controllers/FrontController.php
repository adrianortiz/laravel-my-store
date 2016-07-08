<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $productos = Producto::join('categories', 'products.categories_id', '=' , 'categories.id')
            ->join('proveedores', 'products.proveedores_id', '=', 'proveedores.id')
            ->select('products.*', 'proveedores.nom_empresa', 'categories.name AS name_category')
            ->get();

        $sliders = Slider::all();

        $categorias = Categoria::all();
        return view('index', compact('sliders', 'productos', 'categorias'));
    }
}
