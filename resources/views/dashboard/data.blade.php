@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Data')

@section('content_header')
<div class="row">
    <div class="col-md-8">
        <h5>DAFTAR AKUN & RANGE</h5>
    </div>
    <div class="col-md-4">
        <button class="btn btn-sm btn-outline-primary float-right m-1"><i class="fas fa-plus"></i> Tambah</button>
        <button class="btn btn-sm btn-outline-primary float-right m-1"><i class="fas fa-pencil-alt"></i> Ubah</button>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 d-inline-block pl-3">
        <div class="card" style="min-height: 100%;">
            <div class="card-header">
                <h6 class="d-block">Akun Neraca & Saldo</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <!-- Table Akun -->
                    <table id="table-neraca" class="table table-striped table-bordered table-condensed table-sm">
                        <thead>
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
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
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 48.25%;">
            <div class="card-header">
                <h6 class="pt-1">Pemasok</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-pemasok" class="table table-striped table-bordered table-condensed table-sm">
                        <thead style="display: none;">
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
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
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card" style="height: 48.25%;">
            <div class="card-header">
                <h6 class="pt-1">Proyek</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-proyekan" class="table table-striped table-bordered table-condensed table-sm">
                        <thead style="display: none;">
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
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
    </div>
</div>
<div class="row pt-4 pb-4">
    <div class="col-md-6 d-inline pl-3">
        <div class="card">
            <div class="card-header">
                <h6>Akun Transaksi Kantor</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <!-- Table Akun -->
                    <table id="table-kantor" class="table table-striped table-bordered table-condensed table-sm">
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
            </div>
        </div>
    </div>
    <div class="col-md-6 d-inline">
        <div class="card">
            <div class="card-header">
                <h6>Akun Transaksi Proyek</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-proyek" class="table table-striped table-bordered table-condensed table-sm">
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
    </div>
</div>
@endsection

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
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
<script>
    $(document).ready(function() {
        table1 = $('#table-neraca').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });

        $('#table-kantor').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });

        $('#table-proyek').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });
        
        $('#table-pemasok').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 100,
            scrollCollapse    : true,
            info        : false,
        });

        $('#table-proyekan').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 100,
            scrollCollapse    : true,
            info        : false,
        });

    } );
        $(document).on('shown.lte.pushmenu collapsed.lte.pushmenu', function() {
            console.log("hey gamtenk");
            setTimeout(function(){
                $.fn.dataTable.tables( {api: true} ).columns.adjust();
            }, 300);
        });
</script>

@endsection
