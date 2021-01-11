@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laporan Laba Rugi')

@section('content_header')
<h1>Laporan Laba Rugi</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Anggaran & Realisasi Laba Rugi</h6>
                <h6>Pembangunan Rumah Pak David</h6>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row" style="width: 400px; padding-top: 4px; padding-bottom: 12px;">
                <div class="center-block"><input class="date form-control text-center" type="text"></div>
                <div class="center-block"><h6> s/d </h6></div>
                <div class="center-block"><input class="date form-control  text-center" type="text"></div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="row text-center pt-1">
            <div class="col">
                <table id="table1"class="display table table-stripped table-hover dataTable">
                <thead class="thead-light">
                    <th style="width: 70%">Keterangan</th>
                    <th style="width: 30%">Realisasi</th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><b>Pendapatan</b></td>
                    </tr>
                    <tr>
                        <td>Pendapatan Proyek</td>
                        <td>1.350.000.000</td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        <td class="end-row">1.350.000.000</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Biaya</b></td>
                    </tr>
                    <tr>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>15.000.000</td>
                    </tr>
                    <tr>
                        <td>Biaya Administrasi dan Umum</td>
                        <td>7.500.000</td>
                    </tr>
                    <tr>
                        <td>Biaya Pemasaran</td>
                        <td>25.000.000</td>
                    </tr>
                    <tr>
                        <td>Biaya Material</td>
                        <td>775.000.000</td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        <td class="end-row">1.084.250.000</td>
                    </tr>
                    <tr>
                        <td class="right"><b>Laba</b></td>
                        <td class="end-row">265.750.000</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer"></div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    td.right {
        float: right;
    }
    td.end-row {
        border-top: 2px solid;
    }
    .table td,
    .table th
    {
        text-align:left;
    }
    .table td + td,
    .table th + th
    {
        text-align:right
    }
    h5 {
        font-weight: 600;
    }
    .col h6
    {
        text-transform: uppercase;
    }
    .center-block {
        display: block;
        margin: auto;
    }
    .form-control {
        width: 160px;
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'dd-mm-yyyy',
       orientation: 'bottom'
     });  
     $(document).ready(function() {
        $('#table1').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
    } );
</script> 
@endsection