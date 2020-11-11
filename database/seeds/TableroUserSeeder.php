<?php

use App\tablero_user;
use App\User;
use Illuminate\Database\Seeder;

class TableroUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $can=User::all()->where('role','admin')->count();
        factory(Tablero_user::class, $can)->create();
    }
}
