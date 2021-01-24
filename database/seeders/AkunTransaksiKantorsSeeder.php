<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AkunTransaksiKantorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Administrasi Umum',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Bunga Pinjaman',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Gaji Karyawan',
            'jenis' => 'Keluar',
        'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Listrik',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Penyusutan Aset',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Rumah Tangga Kantor',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Sewa Kantor',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Biaya Telepon/Internet',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Pembayaran Utang Bank',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Perawatan/Pemeliharaan Aset',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Tambahan Dana dari Bank',
            'jenis' => 'Masuk',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Tambahan Dana ke Kas',
            'jenis' => 'Masuk',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_kantors')->insert([
            'nama'=> 'Uangmuka Sewa Kantor',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
    }
}
