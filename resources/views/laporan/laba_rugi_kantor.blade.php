@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laporan & Realisasi Anggaran Kantor')

@section('content_header')
<h5 class="pl-3">LAPORAN ANGGARAN & REALISASI KANTOR</h5>
@endsection

@section('content')
<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
@if(!empty(Auth::user()->id_perusahaan))
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>{{ $perusahaan->nama_perusahaan}}</h5>
                <h6>Laporan Anggaran dan Realisasi</h6>
                <h6>Kantor Pusat</h6>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="{{ $date_range ?? '-- pilih tanggal --' }}" type="text" style="width: 250px;" class="form-control text-center">
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="dataTables_wrapper">
            <table id="table-laba-rugi-kantor"class="table table-striped table-bordered table-condensed table-sm dataTable">
                <thead class="thead-light">
                    </tr role="row">
                        <th style="width: 65%">Keterangan</th>
                        <th style="width: 35%">Realisasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2"><b>Pendapatan</b></td>
                    </tr>
                    @php
                        $total_masuk = 0;
                    @endphp
                    @foreach($sum_per_akuns as $sum_per_akun)
                    @if($sum_per_akun->akun_tr_kantor->jenis == 'Masuk')
                    <tr id="{{ $sum_per_akun->id }}">
                        <td>{{$sum_per_akun->akun_tr_kantor->nama}}</td>
                        <td>{{ number_format($sum_per_akun->total_jumlah, 2, '.', ',') }}</td>
                    </tr>
                    @php
                        $total_masuk += $sum_per_akun->total_jumlah;
                    @endphp
                    @endif
                    @endforeach

                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        <td class="end-row">{{ number_format($total_masuk, 2, '.', ',') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Biaya</b></td>
                    </tr>
                    @php
                        $total_keluar = 0;
                    @endphp
                    @foreach($sum_per_akuns as $sum_per_akun)
                    @if($sum_per_akun->akun_tr_kantor->jenis == 'Keluar')
                    <tr id="{{ $sum_per_akun->id }}">
                        <td>{{$sum_per_akun->akun_tr_kantor->nama}}</td>
                        <td>{{ number_format($sum_per_akun->total_jumlah, 2, '.', ',') }}</td>
                    </tr>
                    @php
                        $total_keluar += $sum_per_akun->total_jumlah;
                    @endphp
                    @endif
                    @endforeach

                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        <td class="end-row">{{ number_format($total_keluar, 2, '.', ',') }}</td>
                    </tr>
                    
                    <tr>
                        @if($total_keluar - $total_masuk > 0)
                        <td class="right" ><b>Rugi</b></td>
                        @else
                        <td class="right" ><b>Laba</b></td>
                        @endif
                        <td class="end-row">{{ number_format(abs($total_keluar - $total_masuk), 2, '.', ',') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer"></div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
@endif
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .content {
    font-size: 12px;
    }
    
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
</style>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#table-laba-rugi-kantor').DataTable({
            paging      : false,
            lengthChange: false,
            searching   : false,
            ordering    : true,
            info        : false,
            autoWidth   : false
        });
    } );
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'center',
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY',
            },
        }, function(start, end, label) {
            start = start.format('DD-MM-YYYY');
            end = end.format('DD-MM-YYYY');
            var all = start + ' - ' + end;
            var url = '/laba_rugi_kantor/' + encodeURIComponent(all);
            console.log(all);
            console.log(url);
            window.location.href = url;
            // console.log("A new date selection was made: " + start + ' to ' + end);
        });
    });
</script> 
@endsection