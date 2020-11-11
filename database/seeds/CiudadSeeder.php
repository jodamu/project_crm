<?php

use App\Ciudad;
use Illuminate\Database\Seeder;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array("Medellin", "Vegachi","Segovia","Rio negro","Sabaneta");

        foreach ($estados as $estado){
            Ciudad::create([
                'name' => $estado,
                'estado_id' => 1
            ]);
        }
    }
}
