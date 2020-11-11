<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\r;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      

        $cargos=Cargo::paginate(15);
        return view('cargos.index', compact('cargos'));
    }

    public function load()
    {
       return  $cargos=Cargo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.create');
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
            'name' => 'required|unique:cargos|max:255',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'name.unique'  => 'Ya se Encuentra registrado en la Base de datos'
        ]);

     Cargo::create([
            'name' => request('name'),

        ]);

        return redirect('cargos')->with('status','El registro se ingreso correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo=Cargo::findOrFail($id);
        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:cargos|max:255',
        ]);

        $guardar=$request->except('_token','_method');

        Cargo::where('id', '=', $id)->update($guardar);
       

        
        return redirect('cargos')->with('status','El registro fue actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargos=Cargo::findOrFail($id);
        $cargos->delete();
        return redirect("cargos")->with('status','El registro fue eliminado correctamente');
        
        
        
    }
}
