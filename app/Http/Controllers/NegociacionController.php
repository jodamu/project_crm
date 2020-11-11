<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Panel;
use App\Tablero;
use App\Tiponegociacion;
use App\User;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegociacionController extends Controller
{
    public function index()
    {
        $tiponegociaciones=Tiponegociacion::all();
        $panels=Panel::all();
        return view("negociacion.index", compact("panels", "tiponegociaciones"));
    }

    public function edit($id)
    {
        $contactos=Contacto::all();
        $panels=Panel::all();
        $usuarios=User::all()->where('role','admin');
        $tablero=Tablero::findOrFail($id);
            return view("negociacion.edit", compact("usuarios","tablero","panels","contactos"));
    }
    
   

    public function cambio(Request $request)
    {
       $data = json_decode($request->name);
        
       var_dump($data);
       echo "----------------------------------\n";
       
      

            foreach($data as $val=>$valor){
                   
             foreach($valor as $valor1=>$valor2){
                // var_dump($val);
                // var_dump($valor1);
                echo "   Tablero: ".$valor2;
                echo "   Panel: ".$val;
                echo "   posicion: ".$valor1;

                echo "\n----------------------------\n";
               
                // var_dump($valor2);                 
            //    foreach($valor2 as $valor3=>$valor4) {

            //       var_dump($valor3);
                $tablero = Tablero::find($valor2);

                        $tablero->panel_id = $val;
                        $tablero->posicion = $valor1;

                        $tablero->save();        
            //   }       
             }
           }

         
    }
}
