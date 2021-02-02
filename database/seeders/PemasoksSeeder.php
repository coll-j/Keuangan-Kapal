<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Perusahaan;

class PemasoksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = DB::table('perusahaans')->select('*')->first();

        DB::table('pemasoks')->insert([
            'nama'=> 'PT. Kayu A',
            'jenis' => 'Pemasok Material Kayu',
            'id_perusahaan' => $perusahaan->id,
        ]);

        DB::table('pemasoks')->insert([
            'nama'=> 'PT. Oli A',
            'jenis' => 'Pemasok Oli',
            'id_perusahaan' => $perusahaan->id,
        ]);
    }
}
