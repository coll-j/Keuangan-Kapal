@extends('adminlte::page')

@section('title', 'Anggaran')

@section('content_header')
<h1>ANGGARAN LABA RUGI</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>PT. XYZ</h5>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="row text-center pt-1">
            <div class="col">
                <table id="table1"class="table table-stripped table-hover dataTable table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 30%">Kode Proyek</th>
                    <th style="width: 18%">1</th>
                    <th style="width: 18%">2</th>
                    <th style="width: 18%">3</th>
                    <th style="width: 16%">Jumlah</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="float-left" colspan="6" style="border: none;"><b>Pendapatan</b></td>
                    </tr>
                    <tr>
                        <td>Pendapatan Proyek</td>
                        <td>1.350.000.000</td>
                        <td>1.350.000.000</td>
                        <td>0</td>
                        <td>2.700.000.000</td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        <td class="end-row">1.350.000.000</td>
                        <td class="end-row">1.350.000.000</td>
                        <td class="end-row">0</td>
                        <td class="end-row">2.700.000.000</td>
                    </tr>
                    <tr>
                        <td class="float-left" colspan="6" style="border: none;"><b>Biaya</b></td>
                    </tr>
                    <tr>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>15.000.000</td>
                        <td>12.500.000</td>
                        <td>2.500.000</td>
                        <td>30.000.000</td>
                    </tr>
                    <tr>
                        <td>Biaya Administrasi dan Umum</td>
                        <td>7.500.000</td>
                        <td>7.600.000</td>
                        <td>999.999.999</td>
                        <td>999.999.999</td>
                    </tr>
                    <tr>
                        <td>Biaya Pemasaran</td>
                        <td>25.000.000</td>
                        <td>22.500.000</td>
                        <td>2.500.000</td>
                        <td>999.999.999</td>
                    </tr>
                    <tr>
                        <td>Biaya Material</td>
                        <td>775.000.000</td>
                        <td>773.500.000</td>
                        <td>1.500.000</td>
                        <td>999.999.999</td>
                    </tr>
                    <tr>
                        <td>Biaya Tenaga Kerja</td>
                        <td>195.000.000</td>
                        <td>191.750.000</td>
                        <td>3.250.000</td>
                        <td>999.999.999</td>
                    </tr>
                    <tr>
                        <td>Biaya Pengawas</td>
                        <td>30.000.000</td>
                        <td>31.150.000</td>
                        <td>-1.150.000</td>
                        <td>999.999.999</td>
                    </tr>
                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        <td class="end-row">1.084.250.000</td>
                        <td class="end-row">1.066.275.000</td>
                        <td class="end-row">17.975.000</td>
                        <td class="end-row">999.999.999</td>
                    </tr>
                    <tr>
                        <td class="right"><b>Laba</b></td>
                        <td class="end-row">265.750.000</td>
                        <td class="end-row">283.725.000</td>
                        <td class="end-row">17.975.000</td>
                        <td class="end-row">99.999.999</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    </div>
    <!-- /.card-footer -->
</div>
@endsection

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@endsection

@section('js')
<script>
    console.log('Hi!'); 
</script>
@endsection