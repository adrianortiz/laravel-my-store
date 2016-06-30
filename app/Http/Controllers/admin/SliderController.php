<?php

namespace App\Http\Controllers\admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin/panel-slider');
    }

    public function store(Request $request) {

        $filePhotoSlider = $request->file('img_name');

        if ($filePhotoSlider != null) {

            $namePhotoProduct = 'product-' . \Auth::user()->id . Carbon::now()->second . $filePhotoSlider->getClientOriginalName();
            \Storage::disk('photo_slider')->put($namePhotoProduct, \File::get($filePhotoSlider));

            $slider = new Slider();
            $slider->fill($request->all());

            if( $slider->save() )
                // dd($request->all());
                return view('admin/panel-slider');

        }

        // abort(500);

    }

    public function prueba() {
        return view('admin/prueba');
    }
}
