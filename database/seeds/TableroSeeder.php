<?php

use App\Tablero;
use Illuminate\Database\Seeder;

class TableroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tablero::class, 15)->create();
    }
}
