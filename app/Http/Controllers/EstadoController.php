<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados=Estado::paginate(15);
        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises=Pais::all();
        return view('estados.create', compact('paises'));
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

     Estado::create([
            'name' => request('name'),
            'pais_id' => request('pais_id'),

        ]);

        return redirect('estado')->with('status','El registro se ingreso correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado=Estado::findOrFail($id);
        return view('estados.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paises=Pais::all();
        $estado=Estado::findOrFail($id);
        return view('estados.edit', compact('paises','estado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
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

        Estado::where('id', '=', $id)->update($guardar);
       

        
        return redirect('estado')->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado=Estado::findOrFail($id);
        $estado->delete();
        return redirect("estado")->with('status','El registro fue eliminado correctamente');
    }
}
