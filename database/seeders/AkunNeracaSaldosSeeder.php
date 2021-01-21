<?php

namespace Database\Seeders;

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
            'saldo' => 999999
        ]);
    }
}
