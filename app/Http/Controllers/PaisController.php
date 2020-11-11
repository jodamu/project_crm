<?php

namespace App\Http\Controllers;

use App\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaisController extends Controller
{
    public function index()
    {
        
            $paises = Pais::all();
                return view('pais.index',compact('paises'));
    }

    public function create()
    {
        return view('pais.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:pais|max:255',
        ]);

    Pais::create([
            'name' => request('name'),

        ]);

        return redirect('pais')->with('status','El registro fue insertado correctamente');
    }


    public function show($id)
    {
        $pais=Pais::findOrFail($id);
        return view('pais.show', compact('pais'));
    }

 
    public function edit($id)
    {
        $pais=Pais::findOrFail($id);
        return view('pais.edit', compact('pais'));
    }

 
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'El campo nombre es obligatorio'
        ]);

        $guardar=$request->except('_token','_method');

        Pais::where('id', '=', $id)->update($guardar);

        return redirect('pais')->with('status','El registro fue actualizado correctamente');
    }

    
    public function destroy($id)
    {
        $pais=Pais::findOrFail($id);
        $pais->delete();
        return redirect("pais")->with('status','El registro fue eliminado correctamente');
    }
}
