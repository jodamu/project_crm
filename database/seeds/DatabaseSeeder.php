<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(EstadosCivilSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(PanelSeeder::class);
        $this->call(ContactoSeeder::class);
        $this->call(TableroSeeder::class);
        $this->call(TableroUserSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(TiponegociacionSeeder::class);
        $this->call(ProductosSeeder::class);
    }
}
