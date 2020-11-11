<?php

namespace App\Http\Controllers;

use App\Tiponegociacion;
use Illuminate\Http\Request;

class TiponegociacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiponegociacions=Tiponegociacion::paginate();
        return view('tiponegociacion.index',compact('tiponegociacions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiponegociacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tiponegociacions|max:255',
        ], [
            'name.required' => 'El campo tipo es obligatorio',
            'name.unique'  => 'Ya se Encuentra registrado en la Base de datos'
        ]);

        Tiponegociacion::create([
            'name' => request('name'),

        ]);

        return redirect('tiponegociacion')->with('status','El registro se ingreso correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tiponegociacion  $tiponegociacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tiponegociacion=Tiponegociacion::findOrFail($id);
        return view('tiponegociacion.show', compact('tiponegociacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tiponegociacion  $tiponegociacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiponegociacion=Tiponegociacion::findOrFail($id);
        return view('tiponegociacion.edit', compact('tiponegociacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tiponegociacion  $tiponegociacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $guardar=$request->except('_token','_method');

        Tiponegociacion::where('id', '=', $id)->update($guardar);
    

        
        return redirect('tiponegociacion')->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tiponegociacion  $tiponegociacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiponegociacion=Tiponegociacion::findOrFail($id);
        $tiponegociacion->delete();
        return redirect("tiponegociacion")->with('status','El registro fue eliminado correctamente');
    }
}
