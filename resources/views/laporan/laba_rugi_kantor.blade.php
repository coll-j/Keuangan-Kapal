@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laporan & Realisasi Anggaran Kantor')

@section('content_header')
<h5 class="pl-3">LAPORAN ANGGARAN & REALISASI KANTOR</h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Anggaran dan Realisasi</h6>
                <h6>Kantor</h6>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="01/01/2018 - 04/01/2018" type="text" style="width: 250px;" class="form-control text-center">
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="dataTables_wrapper">
            <table id="table-laba-rugi-kantor"class="table table-striped table-bordered table-condensed table-sm dataTable">
                <thead class="thead-light">
                    </tr role="row">
                        <th style="width: 65%">Keterangan</th>
                        <th style="width: 35%">Realisasi</th>
                    </tr>
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
    <!-- /.card-body -->

    <div class="card-footer"></div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .content {
    font-size: 12px;
    }
    
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
<script>
    $(document).ready(function() {
        $('#table-laba-rugi-kantor').DataTable({
            paging      : false,
            lengthChange: false,
            searching   : false,
            ordering    : true,
            info        : false,
            autoWidth   : false
        });
    } );
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'center',
            locale: {
                format: 'DD/MM/YYYY',
            }
        });
    });
</script> 
@endsection