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
    <h5 class="pt-2">LAPORAN ANGGARAN & REALISASI LABA RUGI</h5>
    <div class="col container">
        <div class="row text-center pt-5">
            <div class="col">
                <h5>PT. XYZ</h5>
                <h6>Laporan Anggaran & Realisasi Laba Rugi</h6>
                <h6>Pembangunan Rumah Pak David</h6>
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
                    <th style="width: 25%">Keterangan</th>
                    <th style="width: 18%">Anggaran</th>
                    <th style="width: 18%">Realisasi</th>
                    <th style="width: 18%">Selisih</th>
                    <th style="width: 16%">% dari Anggaran</th>
                    <th style="width: 5%">Hasil</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Pendapatan</td>
                        <td>1.350.000.000</td>
                        <td>1.350.000.000</td>
                        <td>0</td>
                        <td>100,00%</td>
                        <td>Up</td>
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