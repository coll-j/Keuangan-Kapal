<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
            'nama' => 'Kapal 1',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
    }
}
