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
        $sliders = Slider::all();
        return view('admin/panel-slider', compact('sliders'));
    }

    public function store(Request $request) {

        $filePhotoSlider = $request->file('img_name');

        if ($filePhotoSlider != null) {

            $namePhotoProduct = 'slider-' . \Auth::user()->id . Carbon::now()->second . '-' . $filePhotoSlider->getClientOriginalName();
            \Storage::disk('photo_slider')->put($namePhotoProduct, \File::get($filePhotoSlider));

            $slider = new Slider();
            $slider->fill($request->all());
            $slider->img_name = $namePhotoProduct;

            if( $slider->save() ) {
                $sliders = Slider::all();
                return view('admin/panel-slider', compact('sliders'));
            }

        }

        // abort(500);
    }


    /**
     * Devuelve la vista de adminitración de los Sliders
     * Con sus Sliders
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function GetViewSlider() {
        $sliders = Slider::all();
        return view('admin/panel-slider', compact('sliders'));
    }

    /**
     * Elimina un Slider del sistema
     * mediante su identificador
     * @param $id
     */
    public function destroy($id) {

        $sliders = Slider::all();
        return view('admin/panel-slider', compact('sliders'));
    }

}
