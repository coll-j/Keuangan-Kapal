<?php

namespace Database\Seeders;

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
        $this->call(AkunNeracaSaldosSeeder::class);
        $this->call(AkunTransaksiKantorsSeeder::class);
        $this->call(AkunTransaksiProyeksSeeder::class);
        $this->call(PemasoksSeeder::class);
        $this->call(ProyeksSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
