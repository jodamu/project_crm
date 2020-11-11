<?php

namespace App\Http\Controllers;

use App\tablero_user;
use App\Tablero_usuario;
use Illuminate\Http\Request;

class TableroUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        

     tablero_user::create([
            'tablero_id' => request('tablero_id'),
            'user_id' => request('user_id'),

        ]);

        return redirect()->back()->with('status','El Colaborador se ingreso correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tablero_usuario  $tablero_usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Tablero_usuario $tablero_usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tablero_usuario  $tablero_usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablero_usuario $tablero_usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tablero_usuario  $tablero_usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tablero_usuario $tablero_usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tablero_usuario  $tablero_usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabuses=tablero_user::findOrFail($id);
        $tabuses->delete();
        return redirect()->back()->with('status','El Colaborador se Elimino correctamente');
    }
}
