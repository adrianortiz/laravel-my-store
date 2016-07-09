<?php

namespace CodizerTienda\Http\Controllers\Admin;

use CodizerTienda\Categoria;
use Illuminate\Http\Request;

use CodizerTienda\Http\Requests;
use CodizerTienda\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.panel-categories', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->fill($request->all());

        if( $categoria->save() ) {
            Session::flash('message', 'Categoría creada.');
            return redirect()->route('admin.categorias');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $categoria = Categoria::findOrFail($request->id);
            $categoria->fill($request->all());
            $categoria->save();

            Session::flash('message', 'Categoría actualizada.');

            DB::commit();
            return redirect()->route('admin.categorias');
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('message', 'Ocurrio un problema');
            return redirect()->route('admin.categorias');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Categoria::destroy($id);

            Session::flash('message', 'Categoría eliminada.');

            DB::commit();
            return redirect()->route('admin.categorias');
        } catch (\Exception $e) {
            DB::rollback();

            Session::flash('message', 'La categoría ha sido asignada y no puede eliminarse');
            return redirect()->route('admin.categorias');
        }
    }
}
