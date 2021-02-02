<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Perusahaan;
use App\Models\Proyek;

class ProyeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pemilik_proyek = User::where('role', 4)->first();

        Proyek::create([
            'id_pemilik' => $pemilik_proyek->id,
            'kode_proyek' => 'XYZ_1',
            'jenis' => 'Kapal Pesiar Jek',
            'id_perusahaan' => $pemilik_proyek->id_perusahaan,
        ]);

        Proyek::create([
            'id_pemilik' => $pemilik_proyek->id,
            'kode_proyek' => 'XYZ_2',
            'jenis' => 'Kapal Ferry Jek',
            'id_perusahaan' => $pemilik_proyek->id_perusahaan,
        ]);

        Proyek::create([
            'id_pemilik' => $pemilik_proyek->id,
            'kode_proyek' => 'XYZ_3',
            'jenis' => 'Dermaga Jek',
            'id_perusahaan' => $pemilik_proyek->id_perusahaan,
        ]);
    }
}
