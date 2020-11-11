<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors= Sector::paginate(10); 
        return view("sector.index",compact("sectors"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("sector.create");
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
            'name' => 'required|unique:sectors|max:255',
        ]);

     Sector::create([
            'name' => request('name'),

        ]);

        return redirect('sector')->with('status','El registro fue insertado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector=Sector::findOrFail($id);
        return view("sector.show",compact("sector"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector=Sector::findOrFail($id);
        return view("sector.edit",compact("sector"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:sectors|max:255',
        ]);
        $guardar = $request->except("_token","_method");
        Sector::where("id","=",$id)->update($guardar);
        return redirect("sector")->with('status','El registro fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector=Sector::find($id);
        $sector->delete();
        return redirect("sector")->with('status','El registro fue eliminado correctamente');
    }
}
