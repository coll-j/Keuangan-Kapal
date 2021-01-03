@extends('layouts.master')
@section('title')
Anggaran Laba Rugi
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
</style>
@endsection
@section('main')
<div class="col">
<h5 class="pt-2">Anggaran Laba Rugi</h5>
<div class="row text-center pt-3">
    <div class="col">
        <h6>PT. XYZ</h6>
    </div>
</div>
<div class="row text-center pt-1">
    <div class="col">
        <table class="table table-stripped table-condensed table-lg">
        <thead class="thead-light">
            <th style="width: 20%">Kode Proyek</th>
            <th style="width: 20%"></th>
            <th style="width: 15%">1 (Kapal 1)</th>
            <th style="width: 15%">2 (Kapal 2)</th>
            <th style="width: 15%">3 (Kapal 3)</th>
            <th style="width: 15%">Jumlah</th>
        </thead>
        <tbody>
            <tr>
                <td>Pendapatan</td>
                <td></td>
                <td>999.999</td>
                <td></td>
                <td>999.999</td>
                <td>999.999</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection