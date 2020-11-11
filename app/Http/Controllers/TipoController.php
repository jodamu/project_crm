<?php

namespace App\Http\Controllers;

use App\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $tipos=Tipo::paginate();
        return view('tipos.index',compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.create');
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
            'name' => 'required|unique:tipos|max:255',
        ], [
            'name.required' => 'El campo tipo es obligatorio',
            'name.unique'  => 'Ya se Encuentra registrado en la Base de datos'
        ]);

     Tipo::create([
            'name' => request('name'),

        ]);

        return redirect('tipo')->with('status','El registro se ingreso correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo=Tipo::findOrFail($id);
        return view('tipos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo=Tipo::findOrFail($id);
        return view('tipos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tipos|max:255',
        ]);

        $guardar=$request->except('_token','_method');

        Tipo::where('id', '=', $id)->update($guardar);
       

        
        return redirect('tipo')->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo=Tipo::findOrFail($id);
        $tipo->delete();
        return redirect("tipo")->with('status','El registro fue eliminado correctamente');
    }
}
