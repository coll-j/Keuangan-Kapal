<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AkunNeracaSaldosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun_neraca_saldos')->insert([
            'nama'=> 'Kas',
            'saldo' => 999999,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
    }
}
