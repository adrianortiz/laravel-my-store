<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

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

            Image::make('media/photo-slider/'.$namePhotoProduct)->resize(880, 490)->save('media/photo-slider/'.$namePhotoProduct);

            if( $slider->save() ) {
                return redirect()->route('admin.slider');
            }

        }

        // abort(500);
    }


    /**
     * Elimina un Slider del sistema
     * mediante su identificador
     * @param $id
     */
    public function destroy($id) {
        Slider::destroy($id);
        Session::flash('message', 'El Slider fue eliminado.');
        return redirect()->route('admin.slider');
    }

}
