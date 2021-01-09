@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Data')

@section('content_header')
<h1>DAFTAR AKUN & RANGE</h1>
@endsection

@section('content')
<div class="col-md-8 d-inline-block pl-5">
    <div class="row">
        <div class="col">
            <h6 class="d-block">Akun Neraca & Saldo</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-inline table-keuangan ">

            <!-- Table Akun -->
            <table class="table table-striped table-bordered table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 60%;">Akun</th>
                    <th style="width: 40%;">Saldo</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Kas</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Piutang Usaha</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Kendaraan</td>
                        <td>99.999</td>
                    </tr>
                    <tr>
                        <td>Peralatan Kantor</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Akumulasi Penyusutan Aset</td>
                        <td>9.999</td>
                    </tr>
                    <tr>
                        <td>Utang Usaha</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Utang Bank</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Modal</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Saldo Laba</td>
                        <td>999.999</td>
                    </tr>
                    <tr>
                        <td>Laba (Rugi) Berjalan</td>
                        <td>999.999</td>
                    </tr>
                </tbody>
            </table>
            <!-- END Table akun -->
        </div>
        <div class="col-md-6 d-inline table-keuangan">
            <table class="table table-striped table-bordered table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 60%;">Range</th>
                    <th style="width: 40%;">Nama</th>
                </thead>
                <tbody>
                    <tr>
                        <td> </td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>B</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>C</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>D</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>E</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>F</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>G</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>H</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>I</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>J</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>K</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-6 d-inline table-keuangan">
            <h6>Akun Transaksi Kantor</h6>
            <!-- Table Akun -->
            <table class="table table-striped table-bordered table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 70%;">Akun</th>
                    <th style="width: 30%;">Ket.</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Biaya Administrasi Umum</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Bunga Pinjaman</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Gaji Karyawan</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Listrik</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Penyusutan Aset</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Rumah Tangga Kantor</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Sewa Kantor</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Telepon/Internet</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Pembayaran Utang Bank</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Perawatan/Pemeliharaan Aset</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Tambahan Dana Dari Bank</td>
                        <td>Masuk</td>
                    </tr>
                    <tr>
                        <td>Tambahan Dana Ke Kas</td>
                        <td>Masuk</td>
                    </tr>
                </tbody>
            </table>
            <!-- END Table akun -->
        </div>
        <div class="col-md-6 d-inline table-keuangan">
            <h6>Akun Transaksi Proyek</h6>
            <table class="table table-striped table-bordered table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 70%;">Akun</th>
                    <th style="width: 30%;">Ket.</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Biaya Administrasi dan Umum</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya lain-lain (tak terduga)</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Listrik</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Material</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Pengawas</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Persiapan dan Perizinan</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Sewa Alat</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Tenaga Kerja</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Pembayaran Utang</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Biaya Sewa Lahan</td>
                        <td>Keluar</td>
                    </tr>
                    <tr>
                        <td>Pendapatan Proyek</td>
                        <td>Masuk</td>
                    </tr>
                    <tr>
                        <td>Penerimaan Piutang Proyek</td>
                        <td>Masuk</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="col-md-4 pt-4">
    <div class="row">
        <div class="col-md-4">
            <h6 class="pt-1">Pemasok</h6>
        </div>
        <div class="col-md-8 d-inline">
            <table class="table table-striped table-bordered table-condensed table-sm">
                <tbody>
                    <tr>
                        <td style="width: 20%;">A</td>
                        <td style="width: 80%">Pemasok Material Kayu</td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td>Pemasok Material Besi</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>Pemasok Perlengkapan Lainnya</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h6 class="pt-1">Proyek</h6>
        </div>
        <div class="col-md-8 d-inline">
            <table class="table table-striped table-bordered table-condensed table-sm">
                <tbody>
                    <tr>
                        <td style="width: 20%;">1</td>
                        <td style="width: 80%">Kapal 1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Kapal 2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Kapal 3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
    background-color: #fff;
    }

    .table-keuangan table tr td:last-child {
    text-align: right;
    }
</style>
@endsection

@section('js')
@endsection
