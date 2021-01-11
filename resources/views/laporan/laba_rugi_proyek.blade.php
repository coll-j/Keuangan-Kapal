@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laba Rugi Proyek')

@section('content_header')
<h1>Laporan Laba Rugi Proyek</h1>
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
                    <th style="width: 25%">Keterangan</th>
                    <th style="width: 18%">Anggaran</th>
                    <th style="width: 18%">Realisasi</th>
                    <th style="width: 18%">Selisih</th>
                    <th style="width: 16%">% dari Anggaran</th>
                    <th style="width: 5%">Hasil</th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6"><b>Pendapatan</b></td>
                    </tr>
                    <tr>
                        <td>Pendapatan Proyek</td>
                        <td>1.350.000.000</td>
                        <td>1.350.000.000</td>
                        <td>0</td>
                        <td>100,00%</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        <td class="end-row">1.350.000.000</td>
                        <td class="end-row">1.350.000.000</td>
                        <td class="end-row">0</td>
                        <td class="end-row">100,00%</td>
                        <td class="end-row"></td>
                    </tr>
                    <tr>
                        <td colspan="6"><b>Biaya</b></td>
                    </tr>
                    <tr>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>15.000.000</td>
                        <td>12.500.000</td>
                        <td>2.500.000</td>
                        <td>83,33%</td>
                        <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                    <tr>
                        <td>Biaya Administrasi dan Umum</td>
                        <td>7.500.000</td>
                        <td>7.600.000</td>
                        <td>-100.000</td>
                        <td>101,33%</td>
                        <td><i class="fa fa-arrow-alt-circle-down"></i></td>
                    </tr>
                    <tr>
                        <td>Biaya Pemasaran</td>
                        <td>25.000.000</td>
                        <td>22.500.000</td>
                        <td>2.500.000</td>
                        <td>90,00%</td>
                        <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                    <tr>
                        <td>Biaya Material</td>
                        <td>775.000.000</td>
                        <td>773.500.000</td>
                        <td>1.500.000</td>
                        <td>99,81%</td>
                        <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                    <tr>
                        <td>Biaya Tenaga Kerja</td>
                        <td>195.000.000</td>
                        <td>191.750.000</td>
                        <td>3.250.000</td>
                        <td>98,33%</td>
                        <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                    <tr>
                        <td>Biaya Pengawas</td>
                        <td>30.000.000</td>
                        <td>31.150.000</td>
                        <td>-1.150.000</td>
                        <td>103,83%</td>
                        <td><i class="fa fa-arrow-alt-circle-down"></i></td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        <td class="end-row">1.084.250.000</td>
                        <td class="end-row">1.066.275.000</td>
                        <td class="end-row">17.975.000</td>
                        <td class="end-row">98,34%</td>
                        <td class="end-row"><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                    <tr>
                        <td class="right"><b>Laba</b></td>
                        <td class="end-row">265.750.000</td>
                        <td class="end-row">283.725.000</td>
                        <td class="end-row">17.975.000</td>
                        <td class="end-row">106,76%</td>
                        <td class="end-row"><i class="fa fa-arrow-alt-circle-up"></i></td>
                    </tr>
                </tbody>
                </table>
                <div class="col pt-4">
                    <div class="row"><h6>Keterangan :</h6></div>
                    <div class="row">
                        <i class="fa fa-arrow-alt-circle-up"></i>
                        
                        <p>&nbsp; Menguntungkan</p>
                    </div>
                    <div class="row">
                        <i class="fa fa-arrow-alt-circle-down"></i>
                        <p>&nbsp; Merugikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    </div>
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
    .fa-arrow-alt-circle-up{
        color : green;
    }
    .fa-arrow-alt-circle-down{
        color : red;
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
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
    } );
</script> 
@endsection