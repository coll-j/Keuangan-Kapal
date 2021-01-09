@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laba Rugi Kantor')

@section('content_header')
<h1>LAPORAN LABA RUGI KANTOR</h1>
@endsection

@section('content')
<div class="col">
    <div class="col container">
        <div class="row text-center">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Laba Rugi</h6>
                <h6>Kantor Pusat</h6>
                <div class="row" style="padding-top: 4px; padding-bottom: 12px; padding-left: 10%; padding-right:10%">
                    <div class="center-block" ><input class="date form-control text-center" type="text"></div>
                    <div class="center-block sd" ><h6> s/d </h6></div>
                    <div class="center-block"><input class="date form-control  text-center" type="text"></div>
                </div>
                
            </div>
        </div>
        <div class="row text-center pt-1">
            <div class="col">
                <table class="table table-stripped table-condensed table-lg">
                <thead class="thead-light">
                    <th style="width: 70%">Keterangan</th>
                    <th style="width: 30%">Realisasi</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendapatan</td>
                        <td>1.350.000.000</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
</script> 
@endsection