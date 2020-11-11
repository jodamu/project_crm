<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Productos;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
    public function index()
    {
        $stock=Producto::all()->where('stock', '<', '5');
        $productos=Producto::all();
        return view('productos.index', compact('productos', 'stock'));
    }


    public function create()
    {
        return view('productos.create');
    }

    
    public function store(request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255'
        ], [
            'nombre.required' => 'El campo tipo es obligatorio'
            
        ]);

     Producto::create([
            'nombre' => request('nombre'),
            'stock' => request('stock'),
            'valor' => request('valor'),
            'descripcion' => request('descripcion'),

        ]);

        return redirect('producto')->with('status','El registro se ingreso correctamente');
    }

    
    public function show($id)
    {
        $producto=Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:255',
        ]);

        $guardar=$request->except('_token','_method');

        Producto::where('id', '=', $id)->update($guardar);
    

        
        return redirect('producto')->with('status','El registro fue actualizado correctamente');
    }

    
    public function destroy($id)
    {
        //
    }
}
