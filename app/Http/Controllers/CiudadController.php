<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Estado;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades=Ciudad::all();
        return view('ciudad.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=Estado::all();
        return view('ciudad.create', compact('estados'));
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
            'name' => 'required|max:255',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

     Ciudad::create([
            'name' => request('name'),
            'estado_id' => request('estado_id'),

        ]);

        return redirect('ciudad')->with('status','El registro se ingreso correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad=Ciudad::findOrFail($id);
        return view('ciudad.show', compact('ciudad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados=Estado::all();
        $ciudad=Ciudad::findOrFail($id);
        return view('ciudad.edit', compact('estados', 'ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        $guardar=$request->except('_token','_method');

        Ciudad::where('id', '=', $id)->update($guardar);
    
    
        return redirect('ciudad')->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad=Ciudad::findOrFail($id);
        $ciudad->delete();
        return redirect("ciudad")->with('status','El registro fue eliminado correctamente');
    }
}
