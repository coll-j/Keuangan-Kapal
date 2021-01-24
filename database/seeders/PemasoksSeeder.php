<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PemasoksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemasoks')->insert([
            'kode'=> 'PT. Kayu A',
            'nama' => 'Pemasok Material Kayu',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
    }
}
