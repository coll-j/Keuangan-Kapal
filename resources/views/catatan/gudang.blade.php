@extends('adminlte::page')

@section('title', 'Gudang')

@section('content_header')
<h5 class="pl-3"><b>GUDANG</b></h5>
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
        <div class="row pt-1">
            <div class="col">
                <table id="table1"class="table table-stripped table-hover dataTable table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 40%">Nama Barang</th>
                    <th style="width: 20%">Satuan</th>
                    <th style="width: 20%">Jumlah</th>
                    <th style="width: 20%">Harga Satuan (Rp)</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Kayu</td>
                        <td>Buah</td>
                        <td>100</td>
                        <td>500,000</td>
                    </tr>
                    <tr>
                        <td>Oli</td>
                        <td>Liter</td>
                        <td>100</td>
                        <td>500,000</td>
                    </tr>
                    <tr>
                        <td>Tanah</td>
                        <td>Hektar</td>
                        <td>100</td>
                        <td>500,000</td>
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