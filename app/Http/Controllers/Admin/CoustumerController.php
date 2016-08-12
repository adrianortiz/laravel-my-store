<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\User;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;

class CoustumerController extends Controller
{
    //
    public function index (){
    }

    public function create(){
    }

    public function edit($id){
        $user = \DB::table('users')
            ->select('id', 'name', 'email', 'password', 'paterno', 'materno', 'sexo', 'fecha_na')
            ->where('users.id', $id)
            ->get();
        return view('admin.panel-edit-coustumer', compact('user'));
    }

    public function update(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try {
            bcrypt($request->password);
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
            return redirect()->route('coustumer.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('coustumer.show');
        }
    }

    public function destroy($id){
        \DB::beginTransaction();
        try {
            User::destroy($id);

            \Session::flash('message', 'Usuario eliminado.');

            \DB::commit();
            return redirect()->route('coustumer.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'El usuario no puede eliminarse');
            return redirect()->route('coustumer.show');
        }
    }

    public function show(){
        $modal = false;
        $users = \DB::table('users')
            ->select('id', 'name', 'email', 'type')
            ->where('users.type', 'coustumer')
            ->get();
        return view('admin.panel-coustumers', compact('users'), compact('modal'));
    }

    public function store(){
    }
}
