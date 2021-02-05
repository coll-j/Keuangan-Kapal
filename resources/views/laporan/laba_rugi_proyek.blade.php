@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Laporan & Realisasi Anggaran Proyek')

@section('content_header')
<h5 class="pl-3">LAPORAN ANGGARAN & REALISASI PROYEK</h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="row">
                <div class="col">
                    <div class="float-right">
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(is_null($curr_proyek))
                                    Semua Proyek
                                @else
                                {{ $curr_proyek->kode_proyek }}
                                @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-right checkbox-menu">
                                <a class="dropdown-item {{ is_null($curr_proyek) ? 'active' : '' }}" style="font-size: 12px;" onclick="tes(this)">
                                Semua Proyek
                                </a>
                                @foreach($proyeks as $proyek)
                                @php
                                    $active = '';
                                @endphp
                                @if(!(is_null($curr_proyek)) && $curr_proyek->id == $proyek->id)
                                    @php $active = 'active'; @endphp
                                @endif
                                <a class="dropdown-item {{ $active }}" id="{{ $proyek->id }}" style="font-size: 12px;" onclick="tes(this)">
                                {{ $proyek->kode_proyek }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>{{ $perusahaan->nama_perusahaan}}</h5>
                    <h6>Laporan Anggaran & Realisasi Proyek</h6>
                    @if(is_null($curr_proyek))
                    <h6>Semua Proyek</h6>
                    @else
                    <h6>{{$curr_proyek->jenis}}</h6>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="{{ $date_range ?? '-- pilih tanggal --' }}" type="text" style="width: 250px;" class="form-control  text-center">
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="dataTables_wrapper">
            <table id="table-laba-rugi-proyek"class="table table-striped table-bordered table-condensed table-sm dataTable">
                <thead class="thead-light">
                    <tr>
                        @if(Auth::user()->role != 4)
                        <th style="width: 25%">Keterangan</th>
                        <th style="width: 18%">Anggaran</th>
                        <th style="width: 18%">Realisasi</th>
                        <th style="width: 18%">Selisih</th>
                        <th style="width: 16%">% dari Anggaran</th>
                        <th style="width: 5%">Hasil</th>
                        @else
                        <th style="width: 25%">Keterangan</th>
                        <th style="width: 18%">Realisasi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6"><b>Pendapatan</b></td>
                    </tr>
                    @foreach($pendapatans as $pendapatan)
                    <tr>
                        <td>{{$pendapatan->nama}}</td>
                        <!-- Kolom Anggaran -->
                        @if(Auth::user()->role != 4)
                            <td>
                            @php
                                $anggaran = \App\Models\Catatan\Anggaran::with('proyek')
                                    ->where('id_perusahaan', Auth::user()->id_perusahaan)
                                    ->where('id_akun_tr_proyek', $pendapatan->id);
                            @endphp
                            @if(!(is_null($curr_proyek)))
                                @php $anggaran = $anggaran->where('id_proyek', $curr_proyek->id) @endphp
                            @endif
                            @php
                                $anggaran = $anggaran->sum('nominal');
                            @endphp
                            {{ 
                                number_format($anggaran, 2, '.', ',')
                            }}
                            </td>
                        @endif
                        <td>
                        @php
                            $realisasi = \App\Models\Catatan\TransaksiProyek::with('proyek')
                                        ->where('id_perusahaan', Auth::user()->id_perusahaan)
                                        ->where('id_akun_tr_proyek', $pendapatan->id)
                        @endphp
                        @if(Auth::user()->role == 4)
                            @php 
                            $realisasi = $realisasi->whereHas('proyek', function($query){
                                return $query->where('id_pemilik', Auth::user()->id);
                            })
                            @endphp
                        @endif
                        @if(!(is_null($curr_proyek)))
                            @php $realisasi = $realisasi->where('id_proyek', $curr_proyek->id) @endphp
                        @endif
                        @if(!(is_null($start_date)) && !(is_null($end_date)))
                            @php $realisasi = $realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]) @endphp
                        @endif
                        @php
                            $realisasi = $realisasi->sum('terbayar');
                        @endphp
                        {{ 
                            number_format($realisasi, 2, '.', ',')
                        }}
                        </td>
                        @if(Auth::user()->role != 4)
                            <td>
                            @php
                                $selisih = $realisasi - $anggaran;
                            @endphp
                            {{ 
                                number_format($selisih, 2, '.', ',')
                            }}
                            </td>
                            <td>
                            {{ 
                                number_format($anggaran != 0 ? $realisasi/$anggaran * 100 : 100, 2, '.', ',')
                            }}%
                            </td>
                            @if($selisih > 0)
                            <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                            @elseif($selisih < 0)
                            <td><i class="fa fa-arrow-alt-circle-down"></i></td>
                            @else
                            <td></td>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        @if(Auth::user()->role != 4)
                            <td class="end-row">
                            @php
                                $anggaran = \App\Models\Catatan\Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                                ->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                });
                            @endphp
                            @if(!(is_null($curr_proyek)))
                                @php $anggaran = $anggaran->where('id_proyek', $curr_proyek->id) @endphp
                            @endif
                            @php
                                $anggaran = $anggaran->sum('nominal');
                            @endphp
                            {{
                                number_format($anggaran, 2, '.', ',')
                            }}
                            </td>
                        @endif
                        <td class="end-row">
                        @php
                            $realisasi = \App\Models\Catatan\TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Masuk');
                            });
                        @endphp
                        @if(Auth::user()->role == 4)
                            @php 
                            $realisasi = $realisasi->whereHas('proyek', function($query){
                                return $query->where('id_pemilik', Auth::user()->id);
                            })
                            @endphp
                        @endif
                        @if(!(is_null($curr_proyek)))
                            @php $realisasi = $realisasi->where('id_proyek', $curr_proyek->id) @endphp
                        @endif
                        @if(!(is_null($start_date)) && !(is_null($end_date)))
                            @php $realisasi = $realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]) @endphp
                        @endif
                        @php
                            $realisasi = $realisasi->sum('jumlah');
                        @endphp
                        {{
                            number_format($realisasi, 2, '.', ',')
                        }}
                        </td>
                        @if(Auth::user()->role != 4)
                            <td class="end-row">
                            @php
                                $selisih = $realisasi - $anggaran;
                            @endphp
                            {{ 
                                number_format($selisih, 2, '.', ',')
                            }}
                            </td>
                            <td class="end-row">
                            {{ 
                                number_format($anggaran != 0 ? $realisasi/$anggaran * 100 : 100, 2, '.', ',')
                            }}%
                            </td>
                            @if($selisih > 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-up"></i></td>
                            @elseif($selisih < 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-down"></i></td>
                            @else
                            <td class="end-row"></td>
                            @endif
                        @endif
                    </tr>
                    <tr>
                        <td colspan="6"><b>Biaya</b></td>
                    </tr>
                    @foreach($biayas as $biaya)
                    <tr>
                        <td>{{ $biaya->nama }}</td>
                        @if(Auth::user()->role != 4)
                            <td>
                            @php
                                $anggaran = \App\Models\Catatan\Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                                    ->where('id_akun_tr_proyek', $biaya->id);
                            @endphp
                            @if(!(is_null($curr_proyek)))
                                @php $anggaran = $anggaran->where('id_proyek', $curr_proyek->id) @endphp
                            @endif
                            @php
                                $anggaran = $anggaran->sum('nominal');
                            @endphp
                            {{ 
                                number_format($anggaran, 2, '.', ',')
                            }}
                            </td>
                        @endif
                        <td>
                        @php
                            $realisasi = \App\Models\Catatan\TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                                        ->where('id_akun_tr_proyek', $biaya->id);
                        @endphp
                        @if(Auth::user()->role == 4)
                            @php 
                            $realisasi = $realisasi->whereHas('proyek', function($query){
                                return $query->where('id_pemilik', Auth::user()->id);
                            })
                            @endphp
                        @endif
                        @if(!(is_null($curr_proyek)))
                            @php $realisasi = $realisasi->where('id_proyek', $curr_proyek->id) @endphp
                        @endif
                        @if(!(is_null($start_date)) && !(is_null($end_date)))
                            @php $realisasi = $realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]) @endphp
                        @endif
                        @php
                            $realisasi = $realisasi->sum('jumlah');
                        @endphp
                        {{ 
                            number_format($realisasi, 2, '.', ',')
                        }}
                        </td>
                        @if(Auth::user()->role != 4)
                            <td>
                            @php
                                $selisih = $anggaran - $realisasi;
                            @endphp
                            {{ 
                                number_format($selisih, 2, '.', ',')
                            }}
                            </td>
                            <td>
                            {{ 
                                number_format($anggaran != 0 ? $realisasi/$anggaran * 100 : 100, 2, '.', ',')
                            }}%
                            </td>
                            @if($selisih > 0)
                            <td><i class="fa fa-arrow-alt-circle-up"></i></td>
                            @elseif($selisih < 0)
                            <td><i class="fa fa-arrow-alt-circle-down"></i></td>
                            @else
                            <td></td>
                            @endif
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        @if(Auth::user()->role != 4)
                            <td class="end-row">
                            @php
                                $anggaran = \App\Models\Catatan\Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                                ->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                });
                            @endphp
                            @if(!(is_null($curr_proyek)))
                                @php $anggaran = $anggaran->where('id_proyek', $curr_proyek->id) @endphp
                            @endif
                            @php
                                $anggaran = $anggaran->sum('nominal');
                            @endphp
                            {{
                                number_format($anggaran, 2, '.', ',')
                            }}
                            </td>
                        @endif
                        <td class="end-row">
                        @php
                            $realisasi = \App\Models\Catatan\TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Keluar');
                            });
                        @endphp
                        @if(Auth::user()->role == 4)
                            @php 
                            $realisasi = $realisasi->whereHas('proyek', function($query){
                                return $query->where('id_pemilik', Auth::user()->id);
                            })
                            @endphp
                        @endif
                        @if(!(is_null($curr_proyek)))
                            @php $realisasi = $realisasi->where('id_proyek', $curr_proyek->id) @endphp
                        @endif
                        @if(!(is_null($start_date)) && !(is_null($end_date)))
                            @php $realisasi = $realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]) @endphp
                        @endif
                        @php
                            $realisasi = $realisasi->sum('jumlah');
                        @endphp
                        {{
                            number_format($realisasi, 2, '.', ',')
                        }}
                        </td>
                        @if(Auth::user()->role != 4)
                            <td class="end-row">
                            @php
                                $selisih = $anggaran - $realisasi;
                            @endphp
                            {{ 
                                number_format($selisih, 2, '.', ',')
                            }}
                            </td>
                            <td class="end-row">
                            {{ 
                                number_format($anggaran != 0 ? $realisasi/$anggaran * 100 : 100, 2, '.', ',')
                            }}%
                            </td>
                            @if($selisih > 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-up"></i></td>
                            @elseif($selisih < 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-down"></i></td>
                            @else
                            <td class="end-row"></td>
                            @endif
                        @endif
                    </tr>
                    <tr>
                        @if(Auth::user()->role != 4)
                        <td class="right"><b>Laba/Rugi</b></td>
                        
                            <!-- Anggaran -->
                            <td class="end-row">
                                @php
                                $p_anggaran = \App\Models\Catatan\Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                                ->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    });

                                $b_anggaran = \App\Models\Catatan\Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                                ->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    });

                                @endphp
                                @if(!(is_null($curr_proyek)))
                                    @php 
                                        $p_anggaran = $p_anggaran->where('id_proyek', $curr_proyek->id);
                                        $b_anggaran = $b_anggaran->where('id_proyek', $curr_proyek->id) 
                                    @endphp
                                @endif
                                @php
                                    $p_anggaran = $p_anggaran->sum('nominal');
                                    $b_anggaran = $b_anggaran->sum('nominal');
                                    $anggaran = $p_anggaran - $b_anggaran;
                                @endphp
                                {{ number_format($anggaran, 2, '.', ',') }}
                            </td>
                        <td class="end-row">
                        @endif
                            @php
                            $p_realisasi = \App\Models\Catatan\TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Masuk');
                                });

                            $b_realisasi = \App\Models\Catatan\TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Keluar');
                                });

                            @endphp
                            @if(Auth::user()->role == 4)
                                @php 
                                    $p_realisasi = $p_realisasi->whereHas('proyek', function($query){
                                        return $query->where('id_pemilik', Auth::user()->id);
                                    });

                                    $b_realisasi = $b_realisasi->whereHas('proyek', function($query){
                                        return $query->where('id_pemilik', Auth::user()->id);
                                    });
                                @endphp
                            @endif
                            @if(!(is_null($curr_proyek)))
                                @php 
                                    $p_realisasi = $p_realisasi->where('id_proyek', $curr_proyek->id);
                                    $b_realisasi = $b_realisasi->where('id_proyek', $curr_proyek->id) 
                                @endphp
                            @endif
                            @if(!(is_null($start_date)) && !(is_null($end_date)))
                                @php 
                                    $p_realisasi = $p_realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]);
                                    $b_realisasi = $b_realisasi->whereBetween('tanggal_transaksi', [$start_date, $end_date]); 
                                @endphp
                            @endif
                            @php
                                $p_realisasi = $p_realisasi->sum('jumlah');
                                $b_realisasi = $b_realisasi->sum('jumlah');
                                $realisasi = $p_realisasi - $b_realisasi;
                            @endphp
                            {{ number_format($realisasi, 2, '.', ',') }}
                        </td>
                        @if(Auth::user()->role != 4)
                            <td class="end-row">
                            @php
                                $selisih = $realisasi - $anggaran;
                            @endphp
                            {{ 
                                number_format($selisih, 2, '.', ',')
                            }}
                            </td>
                            <td class="end-row">
                            {{ 
                                number_format($anggaran != 0 ? $realisasi/$anggaran * 100 : 100, 2, '.', ',')
                            }}%
                            </td>
                            @if($selisih > 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-up"></i></td>
                            @elseif($selisih < 0)
                            <td class="end-row"><i class="fa fa-arrow-alt-circle-down"></i></td>
                            @else
                            <td class="end-row"></td>
                            @endif
                        @endif
                    </tr>
                </tbody>
            </table>
            @if(Auth::user()->role != 4)
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
            @endif
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
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'center',
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY',
            }
        }, function(start, end, label) {
            start = start.format('DD-MM-YYYY');
            end = end.format('DD-MM-YYYY');

            var id_proyek = $('.dropdown-menu').children('a.active').attr('id');
            id_proyek = id_proyek ? id_proyek : 'all';
            console.log(id_proyek);
            var date_range = start + ' - ' + end;
            var url = '/laba_rugi_proyek/' + id_proyek + '/' + encodeURIComponent(date_range);

            console.log(date_range);
            console.log(url);
            window.location.href = url;
            // console.log("A new date selection was made: " + start + ' to ' + end);
        });
    });  
     $(document).ready(function() {
        $('#table-laba-rugi-proyek').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        });

    } );
    function tes(el){
        console.log('tes');
        var id_proyek =$(el).attr('id');
        id_proyek = id_proyek ? id_proyek : 'all';

        var date_range = $('input[name="daterange"]').val();

        if(date_range == '-- pilih tanggal --') date_range = 'all';
        else date_range = date_range.replaceAll('/', '-');

        var url = '/laba_rugi_proyek/' + id_proyek + '/' + encodeURIComponent(date_range);
        window.location.href = url;

        console.log(url);
    }
</script> 
@endsection