<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\AkunTransaksiKantor;

class AkunTransaksiKantorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahan = DB::table('perusahaans')->select('*')->first();
        AkunTransaksiKantor::create([
            'nama'=> 'Biaya Administrasi Umum',
            'jenis' => 'Keluar',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Kewajiban Lancar',
        ]);

        AkunTransaksiKantor::create([
            'nama'=> 'Pembayaran Utang Bank',
            'jenis' => 'Keluar',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Kewajiban Lancar',
        ]);

        AkunTransaksiKantor::create([
            'nama'=> 'Biaya Gaji Karyawan',
            'jenis' => 'Keluar',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Kewajiban Lancar',
        ]);

        AkunTransaksiKantor::create([
            'nama'=> 'Biaya Listrik',
            'jenis' => 'Keluar',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Kewajiban Lancar',
        ]);

        AkunTransaksiKantor::create([
            'nama'=> 'Biaya Sewa Kantor',
            'jenis' => 'Keluar',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Kewajiban Lancar',
        ]);

        AkunTransaksiKantor::create([
            'nama'=> 'Tambahan Dana dari Bank',
            'jenis' => 'Masuk',
            'id_perusahaan' => $perusahan->id,
            'jenis_neraca' => 'Aset Lancar',
        ]);
    }
}
