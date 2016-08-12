<?php

namespace CodizerTienda\Http\Controllers\Admin;

use Illuminate\Http\Request;

use CodizerTienda\User;
use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;

class AdminController extends Controller
{
    //

    public function index(){

    }

    public function edit($id){
        $user = \DB::table('users')
            ->select('id', 'name', 'email', 'password', 'paterno', 'materno', 'sexo', 'fecha_na')
            ->where('users.id', $id)
            ->get();
        return view('admin.panel-edit-admin', compact('user'));
    }

    public function update(Request $request){
        $data = $request->all();
        \DB::beginTransaction();
        try {
            bcrypt($request->password);
            $admin = User::findOrFail($request->id);
            $admin->fill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'paterno' => $data['paterno'],
                'materno' => $data['materno'],
                'sexo' => $data['sexo'],
                'fecha_na' => $data['fecha_na'],
            ]);
            $admin->save();

            \Session::flash('message', 'Administrador actualizado.');

            \DB::commit();
            return redirect()->route('admin.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('admin.show');
        }
    }

    public function destroy($id){
        \DB::beginTransaction();
        try {
            User::destroy($id);

            \Session::flash('message', 'Administrador eliminado.');

            \DB::commit();
            return redirect()->route('admin.show');
        } catch (\Exception $e) {
            \DB::rollback();

            \Session::flash('message', 'El Administrador no puede eliminarse');
            return redirect()->route('admin.show');
        }
    }

    public function show(){
        $modal = false;
        $users = \DB::table('users')
            ->select('id', 'name', 'email', 'type')
            ->where('users.type', 'admin')
            ->get();
        return view('admin.panel-admin', compact('users'), compact('modal'));
    }


}
