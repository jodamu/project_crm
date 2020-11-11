<?php

use App\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectores = array("Evento", "Mecanicos","Almacenes","Medicina");

        foreach ($sectores as $sector){
            Sector::create([
                'name' => $sector
            ]);
        }
    }
}
