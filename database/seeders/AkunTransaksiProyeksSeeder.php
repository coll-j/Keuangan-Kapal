<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Perusahaan;
use App\Models\AkunTransaksiProyek;
use App\Models\Catatan\Anggaran;

class AkunTransaksiProyeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaan = DB::table('perusahaans')->select('*')->first();

        $input_akuns = [
            [
                'nama' => 'Biaya Material',
                'jenis' => 'Keluar',
                'neraca' => 'Kewajiban Lancar'
            ],
            [
                'nama' => 'Biaya Perizinan',
                'jenis' => 'Keluar',
                'neraca' => 'Kewajiban Lancar'
            ],
            [
                'nama' => 'Pendapatan Proyek',
                'jenis' => 'Masuk',
                'neraca' => 'Aset Lancar'
            ],
            [
                'nama' => 'Penerimaan Piutang Proyek',
                'jenis' => 'Masuk',
                'neraca' => 'Aset Lancar'
            ],
            [
                'nama' => 'Biaya Listrik',
                'jenis' => 'Keluar',
                'neraca' => 'Kewajiban Lancar'
            ],
        ];

        foreach($input_akuns as $input_akun)
        {
            $akun = AkunTransaksiProyek::create([
                'nama' => $input_akun['nama'],
                'jenis' => $input_akun['jenis'],
                'id_perusahaan' => $perusahaan->id,
                'jenis_neraca' => $input_akun['neraca'],
    
            ]);
    
            $proyeks = DB::table('proyeks')->select('*')->get();
            foreach($proyeks as $proyek)
            {
                Anggaran::create([
                    'id_akun_tr_proyek' => $akun->id,
                    'id_perusahaan' => $perusahaan->id,
                    'id_proyek' => $proyek->id,
                    'nominal' => 0,
                ]);
            }

        }
    }
}
