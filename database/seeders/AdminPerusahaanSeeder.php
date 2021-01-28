<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash;

class AdminPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Soy Dora',
            'email' => 'admin@a.a',
            'password' => Hash::make('admin123'),
        ]);

        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => 'PT. Berteman Dengan Binatang',
            'alamat' => 'Bawah Jembatan Thor',
            'email' => 'anak.anak@hutan.com',
            'website' => 'google.com',
            // 'telp' => $request->kontak,
        ]);

        $user->id_perusahaan = $perusahaan->id;
        $user->role = 1;
        $user->save();

    }
}
