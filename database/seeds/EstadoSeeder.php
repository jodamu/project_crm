<?php

use App\Estado;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array("Antioquia", "Valle","Bogota","Caldas","Choco");

        foreach ($estados as $estado){
            Estado::create([
                'name' => $estado,
                'pais_id' => 42
            ]);
        }
    }
}
