@extends('adminlte::page')

@section('title', 'Neraca')

@section('content_header')
<h5 class="pl-3"><b>NERACA</b></h5>
@endsection

@section('content')
<div class="card card-outline">
    <div class="card-body box-profile">
        <h1 class="text-center">PT. XYZ</h1>
        <div class="d-flex justify-content-center mb-3">
            <input name="daterange" value="01/01/2021" type="text" style="width: 180px;" class="form-control text-center">
        </div>

        <div class="row pl-2">
            <div class="col-md-2"></div>
            <div class="col-md-4 col-border">
                <table class="display table table-bordered table-stripped table-hover table-condensed table-sm dataTable">
                    <thead>
                        <tr><h5 class="pt-2 text-center"><b>Aset</b></h5></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%; padding: 0px 5px;" class="font-weight-bold">Aset Lancar</td>
                            <td style="border-top: 1px solid black; width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Kas</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Bank</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Piutang Usaha</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Sewa Lahan</td>
                            <td>999.999</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td style="">Total Aset Lancar</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%; padding: 0px 5px;" class="font-weight-bold">Aset Tetap</td>
                            <td style="border-top: 1px solid black; width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Kendaraan</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Peralatan Kantor</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Peralatan Proyek</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px; ">Akumulasi Penyusutan Aset</td>
                            <td>999.999</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td style="">Total Aset Tetap</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%;" class="font-weight-bold">Total Aset Keseluruhan</td>
                            <td style="border-top: 1px solid black; width: 30%;" class="font-weight-bold">999.999</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-border">
                <table class="display table table-stripped table-hover table-bordered table-condensed table-sm dataTable">
                    <thead>
                        <tr><h5 class="pt-2 text-center"><b>Kewajiban</b></h5></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%; padding: 0px 5px;" class="font-weight-bold">Kewajiban Lancar</td>
                            <td style="border-top: 1px solid black; width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Utang usaha</td>
                            <td>999.999</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td style="">Total Kewajiban Lancar</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%; padding: 0px 5px;" class="font-weight-bold">Kewajiban Jangka Panjang</td>
                            <td style="border-top: 1px solid black; width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Utang Bank</td>
                            <td>999.999</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td style="">Total Kewajiban Jangka Panjang</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 70%; padding: 0px 5px;" class="font-weight-bold">Ekuitas</td>
                            <td style="border-top: 1px solid black; width: 30%;"></td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Modal</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Saldo Laba</td>
                            <td>999.999</td>
                        </tr>
                        <tr>
                            <td style="text-indent: 20px;">Laba (Rugi) Berjalan</td>
                            <td>999.999</td>
                        </tr>
                        <tr class="font-weight-bold">
                            <td style="">Total Ekuitas</td>
                            <td>999.999</td>
                        </tr>
                        <!-- <tr class="font-weight-bold">
                            <td style=""><br/></td>
                            <td><br/></td>
                        </tr> -->
                        <tr class="mt-5">
                            <td style="border-top: 1px solid black; width: 70%;" class="font-weight-bold">Total Kewajiban dan Ekuitas</td>
                            <td style="border-top: 1px solid black; width: 30%;" class="font-weight-bold">999.999</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>

        <!-- <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a> -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .col-border{
        border: 0.5px solid lightgray;
    }

    table.table.table-borderless td{
        padding: 0px 10px 0px 5px;
    }

    table tr td:last-child {
    text-align: right;
    }
</style>
@endsection

@section('js')
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'),10)
  });
});
</script>
@endsection