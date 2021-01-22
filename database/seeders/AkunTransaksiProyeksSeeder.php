<?php

namespace Database\Seeders;

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
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Lain-lain (tak terduga)',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Listrik',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Material',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pengawas',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pemasaran',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Persiapan dan Perijinan',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Sewa Alat',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Telepon/Internet',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Tenaga Kerja',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Biaya Pembayaran Utang',
            'jenis' => 'Keluar'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Pendapatan Proyek',
            'jenis' => 'Masuk'
        ]);
        DB::table('akun_transaksi_proyeks')->insert([
            'nama'=> 'Penerimaan Piutang Proyek',
            'jenis' => 'Masuk'
        ]);
    }
}
