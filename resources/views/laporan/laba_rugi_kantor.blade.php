@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laba Rugi Kantor')

@section('content_header')
<h1>Laporan Laba Rugi Kantor</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Laba Rugi</h6>
                <h6>Kantor Pusat</h6>
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
                <table id="table1"class="display table table-bordered table-hover dataTable">
                <thead class="thead-light">
                    </tr role="row">
                        <th style="width: 70%">Keterangan</th>
                        <th style="width: 30%">Realisasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendapatan</td>
                        <td>1.350.000.000</td>
                    </tr>
                    <tr>
                        <td>Pemasukan</td>
                        <td>3.350.000.000</td>
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
        $('#table1').DataTable({
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
    } );
    $('.date').datepicker({  
       format: 'dd-mm-yyyy',
       orientation: 'bottom'
     }); 
</script> 
@endsection