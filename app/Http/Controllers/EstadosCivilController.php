<?php

namespace App\Http\Controllers;

use App\EstadosCivil;
use Illuminate\Http\Request;

class EstadosCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoscivils = EstadosCivil::paginate(10); 
        return view("estadoscivil.index",compact("estadoscivils"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("estadoscivil.create");
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
            'name' => 'required|unique:estados_civils|max:255',
        ]);

     EstadosCivil::create([
            'name' => request('name'),

        ]);

        return redirect('estadoscivil')->with('status','El registro fue insertado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EstadosCivil  $estadosCivil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoscivil=EstadosCivil::findOrFail($id);
        return view("estadoscivil.show",compact("estadoscivil"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EstadosCivil  $estadosCivil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoscivil=EstadosCivil::findOrFail($id);
        return view("estadoscivil.edit",compact("estadoscivil"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EstadosCivil  $estadosCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:estados_civils|max:255',
        ]);
        $guardar = $request->except("_token","_method");
        EstadosCivil::where("id","=",$id)->update($guardar);
        return redirect("estadoscivil")->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadosCivil  $estadosCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      

        $estadosCivil = EstadosCivil::find($id);
        
        $estadosCivil->delete();


        return redirect("estadoscivil")->with('status','El registro fue Eliminado correctamente');
    }
}
