<?php

use App\Tipo;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = array("Clientes", "Prospectos","Proveedor","General");

        foreach ($tipos as $tipo){
            Tipo::create([
                'name' => $tipo
            ]);
        }

    }
}
