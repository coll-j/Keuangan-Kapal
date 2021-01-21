<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ProyeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyeks')->insert([
            'kode'=> 'Pak XYZ',
            'nama' => 'Kapal 1'
        ]);
    }
}
