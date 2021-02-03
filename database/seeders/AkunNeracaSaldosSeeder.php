<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Perusahaan;
use App\Models\AkunNeracaSaldo;

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
        $perusahaan = DB::table('perusahaans')->select('*')->first();

        AkunNeracaSaldo::create([
            'nama' => 'Bank BCA',
            'saldo' => 900000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Bank',
            'jenis_neraca' => 'Aset Lancar',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Bank Mandiri',
            'saldo' => 1000000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Bank',
            'jenis_neraca' => 'Aset Lancar',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Kas',
            'saldo' => 20000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Kas',
            'jenis_neraca' => 'Aset Lancar',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Kendaraan',
            'saldo' => 200000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Lainnya',
            'jenis_neraca' => 'Aset Tetap',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Peralatan Kantor',
            'saldo' => 30000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Lainnya',
            'jenis_neraca' => 'Aset Tetap',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Modal',
            'saldo' => 25000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Lainnya',
            'jenis_neraca' => 'Ekuitas',
        ]);

        AkunNeracaSaldo::create([
            'nama' => 'Utang Bank',
            'saldo' => 30000000,
            'id_perusahaan' => $perusahaan->id,
            'jenis_akun' => 'Lainnya',
            'jenis_neraca' => 'Kewajiban Panjang',
        ]);
    }
}
