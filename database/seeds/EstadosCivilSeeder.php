<?php

use App\EstadosCivil;
use Illuminate\Database\Seeder;

class EstadosCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EstadosCivil::class, 2)->create();
    }
}
