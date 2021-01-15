@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Hutang Piutang')

@section('content_header')
<h5 class="pl-3"><b>HUTANG PIUTANG</b></h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Rincian Piutang</h5>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="dataTables_wrapper">
            <table id="table-piutang" class="table table-bordered table-condensed table-sm dataTable">
            <thead class="thead-light">
                <tr>
                    <th width="6%">Kode</th>
                    <th>Konsumen</th>
                    <th>Transaksi</th>
                    <th>Diterima</th>
                    <th>Piutang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pak David</td>
                    <td>1,350,000,000</td>
                    <td>1,300,000,000</td>
                    <td>50,000,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ibu Ivana</td>
                    <td>1,700,000,000</td>
                    <td>1,400,000,000</td>
                    <td>300,000,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pak Poltak</td>
                    <td>1,350,000,000</td>
                    <td>1,300,000,000</td>
                    <td>50,000,000</td>
                </tr>
            </tbody>
                <tr>
                    <td></td>
                    <td>Jumlah</td>
                    <td>3,900,000,000</td>
                    <td>3,450,000,000</td>
                    <td>450,000,000</td>
                </tr>
            </table>    
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-header">
        <h5>Rincian Utang</h5>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="dataTables_wrapper">
            <table id="table-utang" class="table table-bordered table-condensed table-sm dataTable">
            <thead class="thead-light">
                <tr>
                    <th width="6%">Kode</th>
                    <th>Konsumen</th>
                    <th>Transaksi</th>
                    <th>Diterima</th>
                    <th>Piutang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pak David</td>
                    <td>1,350,000,000</td>
                    <td>1,300,000,000</td>
                    <td>50,000,000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ibu Ivana</td>
                    <td>1,700,000,000</td>
                    <td>1,400,000,000</td>
                    <td>300,000,000</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Pak Poltak</td>
                    <td>1,350,000,000</td>
                    <td>1,300,000,000</td>
                    <td>50,000,000</td>
                </tr>
            </tbody>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>3,900,000,000</td>
                <td>3,450,000,000</td>
                <td>450,000,000</td>
            </tr>
            </table>
        </div>
    </div>
    <div class="card-footer">
    </div>
    <!-- /.card-footer -->
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    * {
        box-sizing: border-box;
    }

    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 16px;
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other on screens that are smaller than 600 px */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
     $(document).ready(function() {
        $('#table-piutang').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });
    } );
     $(document).ready(function() {
        $('#table-utang').DataTable({
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