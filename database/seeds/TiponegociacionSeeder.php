<?php

use App\Tiponegociacion;
use Illuminate\Database\Seeder;

class TiponegociacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = array("Llamada", "Correo Electronico","Visita Cliente","Reunion");

        foreach ($tipos as $tipo){
            Tiponegociacion::create([
                'name' => $tipo
            ]);
        }
    }
}
