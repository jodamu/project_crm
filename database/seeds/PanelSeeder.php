<?php

use App\Panel;
use Illuminate\Database\Seeder;

class PanelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paneles = array("Atención","En proceso","Revision", "Finalizado");

        foreach ($paneles as $panel){
            Panel::create([
                'name' => $panel
            ]);
        }
    }
}
