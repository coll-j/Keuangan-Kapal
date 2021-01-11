@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Profil Perusahaan')

@section('content_header')
<h5 class="pl-3">PROFIL PERUSAHAAN</h5>
@endsection

@section('content')
<div class="row">
    <div class="col pl-4 mt-3">
        <p>Nama Perusahaan</p>
        <h1>PT. XYZ</h1><span style="font-size: 12px;">(Id: 0123456789)</span>
    </div>
    <div class="col">
        <button class="btn btn-sm btn-outline-primary float-right m-1"><i class="fas fa-pencil-alt"></i> Ubah</button>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="row mt-3">
            <div class="pl-4">
            <table>
                <tbody>
                    <tr>
                        <td style="width: 50%;">Alamat Perusahaan<td>
                        <td style="width: 50%">
                        <div style="min-height: 100px">
                            Kampus ITS, Sukolilo, Jl. Raya ITS, Keputih, Surabaya, Jawa Timur 60117
                        </div>
                        <td>
                    </tr>
                    <tr>
                        <td>Pemilik Perusahaan<td>
                        <td><div style="min-height: 90px">Dr. Angka</div><td>
                    </tr>
                    <tr>
                        <td>Kontak Perusahaan<td>
                    </tr>
                    <tr>
                        <td>E-mail<td>
                        <td>humas@its.ac.id<td>
                    </tr>
                    <tr>
                        <td>Website<td>
                        <td>its.ac.id<td>
                    </tr>
                    <tr>
                        <td>Telepon/Fax<td>
                        <td>(031) 5994251<td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3 pb-3">
        <div class="card" style="height: 100%;">
            <div class="card-header">
                <h6 class="d-inline">Anggota Perusahaan</h6>
                <button class="btn btn-xs btn-outline-primary float-right ml-1"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-xs btn-outline-primary float-right mr-1"><i class="fas fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-member" class="display table table-stripped table-hover table-condensed table-sm dataTable">
                    <thead class="thead-light">
                        <th style="width: 60%">Nama</th>
                        <th style="width: 40%">Jabatan</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dr. Angka</td>
                            <td>Pemilik Perusahaan</td>
                        </tr>
                        <tr>
                            <td>Prof. Mochamad Ashari</td>
                            <td>CEO</td>
                        </tr>
                        <tr>
                            <td>Dr. Ahmad Saikhu</td>
                            <td>Project Manager</td>
                        </tr>
                        <tr>
                            <td>Dr. Eng. Chastine Fatichah</td>
                            <td>Direktur</td>
                        </tr>
                        <tr>
                            <td>Dr. Eng. Chastine Fatichah</td>
                            <td>Direktur</td>
                        </tr>
                        <tr>
                            <td>Dr. Eng. Chastine Fatichah</td>
                            <td>Direktur</td>
                        </tr>
                        <tr>
                            <td>Dr. Eng. Chastine Fatichah</td>
                            <td>Direktur</td>
                        </tr>
                        <tr>
                            <td>Dr. Eng. Chastine Fatichah</td>
                            <td>Direktur</td>
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
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
table td, table td * {
    vertical-align: top;
}

td:first-child {
    color: grey;
}
</style>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#table-member').DataTable({
            paging      : false,
            searching   : true,
            scrollY : 200,
            scrollCollapse    : true,
            info        : false,
        });
    } );
</script>
@endsection