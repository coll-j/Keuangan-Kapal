@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Profil Perusahaan')

@section('content_header')
<h5 class="pl-3">PROFIL PERUSAHAAN</h5>
@endsection

@section('content')
<div class="row">
    <div class="box pl-4 mt-3">
        <p>Nama Perusahaan</p>
        <h1>PT. XYZ</h1><span style="font-size: 12px;">(Id: 0123456789)</span>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6 pl-4 mt-3">
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
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
table td, table td * {
    vertical-align: top;
}
</style>
@endsection

@section('js')
<script>
    console.log('Hi!'); 
</script>
@endsection