<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AkunTransaksiProyeksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Administrasi dan Umum',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Lain-lain (tak terduga)',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Listrik',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Material',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pengawas',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pemasaran',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Persiapan dan Perijinan',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Sewa Alat',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Telepon/Internet',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Tenaga Kerja',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pembayaran Utang',
            'jenis' => 'Keluar',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Pendapatan Proyek',
            'jenis' => 'Masuk',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Penerimaan Piutang Proyek',
            'jenis' => 'Masuk',
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
    }
}
