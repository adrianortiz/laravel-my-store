<?php

namespace CodizerTienda\Http\Controllers\Coustumer;

use CodizerTienda\User;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;

class CoustumerController extends Controller
{
    //
    public function index (){
        return view('welcome');
    }

    public function edit(){
        $user = \DB::table('users')
            ->select('id', 'name', 'email', 'password', 'paterno', 'materno', 'sexo', 'fecha_na')
            ->where('users.id', \Auth::user()->id)
            ->get();
        return view('users.edit-user', compact('user'));
    }

    public function update(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try {
            $coustumer = User::findOrFail($request->id);
            $coustumer->fill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'paterno' => $data['paterno'],
                'materno' => $data['materno'],
                'sexo' => $data['sexo'],
                'fecha_na' => $data['fecha_na'],
            ]);
            $coustumer->save();

            \Session::flash('message', 'Usuario actualizado.');

            \DB::commit();
            return redirect()->route('client.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('client.show');
        }
    }

    public function destroy($id){
        \DB::beginTransaction();
        try {
            User::destroy($id);

            \Session::flash('message', 'Usuario eliminado.');

            \DB::commit();
            return redirect()->route('client.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'El usuario no puede eliminarse');
            return redirect()->route('client.show');
        }
    }

    public function show(){
        $user = \DB::table('users')
            ->select('*')
            ->where('users.id', \Auth::user()->id)

            ->get();
        return view('users.show', compact('user'));
    }

    public function store(){
    }
}
