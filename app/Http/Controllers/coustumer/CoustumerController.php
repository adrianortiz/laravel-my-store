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
        return view('users.create');
    }

    public function create(){
        $data = request()->all();
        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->type = 'coustumer';
        $user->save();

        return redirect()->route('coustumer.show');
    }

    public function edit($id){
        $user = \DB::table('users')
            ->select('id', 'name', 'email', 'password')
            ->where('users.id', $id)
            ->get();
        return view('users.edit', compact('user'));
    }

    public function update(Request $request){
        \DB::beginTransaction();
        try {
            $coustumer = User::findOrFail($request->id);
            $coustumer->fill($request->all());
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
        $users = \DB::table('users')
            ->select('id', 'name', 'email', 'type')
            ->where('users.type', 'coustumer')
            ->get();
        return view('users.show', compact('users'));
    }

    public function store(){
    }
}
