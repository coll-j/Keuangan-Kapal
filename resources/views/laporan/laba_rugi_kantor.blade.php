@extends('layouts.master')
@section('title')
Anggaran Laba Rugi Proyek
@endsection
@section('css')
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
</style>
@endsection
@section('main')
<div class="col">
    <h5 class="pt-2">LAPORAN LABA RUGI</h5>
    <div class="col container">
        <div class="row text-center pt-5">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Laba Rugi</h6>
                <h6>Kantor Pusat</h6>
                <div class="row align-items-center" style="padding-top: 4px; padding-bottom: 12px; padding-left: 30%; padding-right:30%">
                    <div class="center-block center"><input class="date form-control center text-center" type="text"></div>
                    <div class="center-block"><h6> s/d </h6></div>
                    <div class="center-block center"><input class="date form-control center text-center" type="text"></div>
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
<script type="text/javascript">
    $('.date').datepicker({  
       format: 'dd-mm-yyyy',
       orientation: 'bottom'
     });  
</script> 
@endsection