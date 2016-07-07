<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

use App\Http\Requests;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('index', compact('sliders'));
    }
}
