@extends('adminlte::page')

@section('title', 'Anggaran')

@section('content_header')
<h5 class="pl-3"><b>ANGGARAN LABA RUGI</b></h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3">
            <div class="col">
                <h5>{{ $perusahaan->nama_perusahaan}}</h5>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="row pt-1">
            <div class="col">
                <div class="row pb-3">
                    <div class="col">
                        @if(Auth::user()->role != 3)
                        <div class="float-right">
                            <form id="ubah-dropdown" class="form-inline">
                                <select id="edit-proyek" class="form-control form-control-sm d-inline mr-1">
                                <option disabled selected value> Pilih Proyek untuk Diubah </option>
                                @foreach($proyeks as $proyek)
                                <option value="{{ $proyek->id }}">{{ $proyek->kode_proyek }}</option>
                                @endforeach
                                </select>
                                <button class="btn btn-sm btn-primary d-inline float-right ml-1" form="" onclick="edit_proyek();">Ubah</button>
                            </form>
                            <button id="save-btn" class="btn btn-sm btn-primary float-right" style="display: none;" onclick="save_edit()">Simpan</button>
                        </div>
                        <div class="float-left" id="display-proyek">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilih Proyek untuk Ditampilkan
                                </button>
                                <div class="dropdown-menu checkbox-menu">
                                    @php
                                        $data_col = 1;
                                    @endphp
                                    @foreach($proyeks as $proyek)
                                    <a class="dropdown-item toggle-vis" data-column="{{ $data_col }}" style="font-size: 12px;">
                                    <input type="checkbox" checked/> {{ $proyek->kode_proyek }}</a>
                                    @php
                                        $data_col++;
                                    @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table id="table-anggaran" class="table table-light table-hover table-condensed table-sm" style="min-width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 200px">Kode Proyek</th>
                                    @foreach($proyeks as $proyek)
                                    <th style="width: 100px">{{$proyek->kode_proyek ?? ''}}</th>
                                    @endforeach
                                    <th style="width: 100px">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            <!-- PENDAPATAN -->
                            <tr>
                                <td class="float-left" colspan="6" style="border: none;"><b>Pendapatan</b></td>
                                @foreach($proyeks as $proyek)
                                <td> </td>
                                @endforeach
                                <td> </td>
                            </tr>
                            @foreach($pendapatans as $pendapatan)
                            <tr>
                                <td class="akun-{{ $pendapatan->id }}">{{$pendapatan->nama}}</td>
                                @foreach($proyeks as $proyek)
                                <td class="akun-{{ $pendapatan->id }} pr-{{ $proyek->id }}">
                                {{ number_format(\App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)
                                ->where('id_akun_tr_proyek', $pendapatan->id)
                                ->first()->nominal, 2, '.', ',')}}
                                </td>
                                @endforeach
                                <td>
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::where('id_akun_tr_proyek', $pendapatan->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="right" ><b>Jumlah Pendapatan</b></td>
                                @foreach($proyeks as $proyek)
                                <td>
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                                @endforeach
                                <td class="end-row">
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                            </tr>
                            
                            <!-- BIAYA -->
                            <tr>
                                <td class="float-left" colspan="6" style="border: none;"><b>Biaya</b></td>
                                @foreach($proyeks as $proyek)
                                <td></td>
                                @endforeach
                                <td></td>
                            </tr>
                            @foreach($biayas as $biaya)
                            <tr>
                                <td class="akun-{{ $biaya->id }}">{{$biaya->nama}}</td>
                                @foreach($proyeks as $proyek)
                                <td class="akun-{{ $biaya->id }} pr-{{ $proyek->id }}">
                                {{ number_format(\App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)
                                ->where('id_akun_tr_proyek', $biaya->id)
                                ->first()->nominal, 2, '.', ',')}}
                                </td>
                                @endforeach
                                <td>
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::where('id_akun_tr_proyek', $biaya->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="right" ><b>Jumlah Biaya</b></td>
                                @foreach($proyeks as $proyek)
                                <td>
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                                @endforeach
                                <td class="end-row">
                                {{
                                    number_format(\App\Models\Catatan\Anggaran::whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    })->sum('nominal'), 2, '.', ',')
                                }}
                                </td>
                            </tr>

                            <tr>
                                <td class="right"><b>Laba</b></td>
                                @foreach($proyeks as $proyek)
                                @php
                                $p_proyek = \App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    })->sum('nominal');

                                $b_proyek = \App\Models\Catatan\Anggaran::where('id_proyek', $proyek->id)->whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    })->sum('nominal');
                                @endphp
                                <td>{{ number_format($p_proyek - $b_proyek, 2, '.', ',') }}</td>
                                @endforeach
                                @php
                                $p_total = \App\Models\Catatan\Anggaran::whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Masuk');
                                    })->sum('nominal');

                                $b_total = \App\Models\Catatan\Anggaran::whereHas('akun_tr_proyek', function($query){
                                    return $query->where('jenis', 'Keluar');
                                    })->sum('nominal')
                                @endphp
                                <td class="end-row">{{ number_format($p_total - $b_total, 2, '.', ',') ?? '' }}</td>
                            </tr>
                            </tbody>
                        </table>
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
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.bootstrap.min.css">

<style>
.content {
    font-size: 12px;
}

</style>
@endsection

@section('js')
<script src="https://unpkg.com/autonumeric"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

<script>

    $(document).ready(function() {
        var table = $('#table-anggaran').DataTable({
            searching: false,
            info: false,
            sorting: false,
            ordering: false,
            scrollY:        false,
            scrollX:        true,
            scrollCollapse: true,
            paging:         false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1,
            },
            buttons: [
            {
                extend: 'colvis',
                columns: ':not(.noVis)'
            }
        ]
        });

        $('a.toggle-vis').on( 'click', function (e) {
            // e.preventDefault();
            var checkbox = $(this).children('input');
            // console.log('tes cek ', checkbox.attr('checked'));
            var check = checkbox.attr('checked') == 'checked' ? 'unchecked' : 'checked';
            checkbox.attr('checked', check);
            // Get the column API object
            var column = table.column( $(this).attr('data-column') );
    
            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
    });

    function edit_proyek(){
        var id_proyek = $('#edit-proyek').val();
        if(id_proyek)
        {
            console.log(id_proyek);
            var class_tag = '.pr-' + id_proyek;
            console.log(class_tag);
            $(class_tag).each(function(idx, obj){
                var td = $(obj)
                var val = td.html();
                var html = '<input class="edit-data" type="text" value="' + val + '">'
                td.html(html);
                // console.log(id_proyek);
            })
            new AutoNumeric.multiple('.edit-data');
            
            $('#ubah-dropdown').hide();
            $('#save-btn').show();
            $('#display-proyek').hide();
        }
    }
    
    function save_edit(){
        // TODO: buat form
        var id_proyek = $('#edit-proyek').val();
        var class_tag = '.pr-' + id_proyek;
        var all_input = []
        $(class_tag).each(function(idx, obj){
            var td = $(obj)

            var val = td.find('input').val();
            var akun = td.attr("class").split(' ')[0];
            // var akun = akun.replace('akun-', '');

            // var json_data = { 'id_akun': akun, 'val': val};
            var input = '<input type="text" name="'+ akun +'" value="' + val + '">';
            all_input.push(input)
        })
        var form = '<form method="post" action="{{ route("update_anggaran") }}">\
                    @csrf';
        var id_input = '<input type="text" name="id_proyek" value="' + id_proyek + '">';
        form = form.concat(id_input);
        for(var i in all_input)
        {
            // console.log();
            form = form.concat(all_input[i]);
        }
        form = form.concat('</form>');
        console.log(form);
        $(form).appendTo('body').submit();
    }
</script>
@endsection