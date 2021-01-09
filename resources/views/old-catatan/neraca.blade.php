@extends('layouts.master')
@section('title')
Neraca
@endsection
@section('css')
<style>
    .col-aset{
        border: 1px solid black;
    }
    .col-kewajiban{
        border: 1px solid black;
    }

    table.table.table-borderless td{
        padding: 0px 10px 0px 5px;
    }

    table tr td:last-child {
    text-align: right;
    }
</style>
@endsection
@section('main')
<div class="col">
<h5 class="pt-2">Neraca</h5>
<div class="row text-center pt-3">
    <div class="col">
        <h6>PT. XYZ</h6>
        <h6>NERACA</h6>
        <p>05/11/2020</p>
    </div>
</div>
<div class="row pl-2">
    <div class="col-md-2"></div>
    <div class="col-md-4 col-aset bg-white">
        <h6 class="text-center">Aset</h6>
        <table class="table table-borderless">
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
    <div class="col-md-4 col-kewajiban bg-white">
        <h6 class="text-center">Kewajiban</h6>
        <table class="table table-borderless">
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
</div>
@endsection