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
                <h5>PT. XYZ</h5>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <div class="row pt-1">
            <div class="col">
                <div class="float-right mb-1">
                    <form id="ubah-dropdown" class="form-inline">
                        <select id="edit-proyek" class="form-control form-control-sm d-inline mr-1">
                        <option disabled selected value> -- pilih proyek untuk diubah -- </option>
                        @foreach($proyeks as $proyek)
                        <option value="{{ $proyek->id }}">{{ $proyek->kode_proyek }}</option>
                        @endforeach
                        </select>
                        <button class="btn btn-sm btn-primary d-inline float-right ml-1" form="" onclick="edit_proyek();">Ubah</button>
                    </form>
                    <button id="save-btn" class="btn btn-sm btn-primary float-right" style="display: none;" onclick="save_edit()">Simpan</button>
                </div>
                <table id="table1"class="table table-stripped table-hover dataTable table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 30%">Kode Proyek</th>
                    @foreach($proyeks as $proyek)
                    <th style="">{{$proyek->kode_proyek}}</th>
                    @endforeach
                    <th style="width: 16%">Jumlah</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="float-left" colspan="6" style="border: none;"><b>Pendapatan</b></td>
                    </tr>
                    @foreach($pendapatans as $pendapatan)
                    <tr>
                        <td class="akun-{{ $pendapatan->id }}">{{$pendapatan->nama}}</td>
                        @foreach($proyeks as $proyek)
                        <td class="akun-{{ $pendapatan->id }} pr-{{ $proyek->id }}">1,350,000,000</td>
                        @endforeach
                        <td>JUMLAH</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="right" ><b>Jumlah Pendapatan</b></td>
                        @foreach($proyeks as $proyek)
                        <td>JUMLAH_PER_PROYEK</td>
                        @endforeach
                        <td class="end-row">2.700.000.000</td>
                    </tr>
                    <tr>
                        <td class="float-left" colspan="6" style="border: none;"><b>Biaya</b></td>
                    </tr>
                    @foreach($biayas as $biaya)
                    <tr>
                        <td class="akun-{{ $biaya->id }}">{{$biaya->nama}}</td>
                        @foreach($proyeks as $proyek)
                        <td class="akun-{{ $biaya->id }} pr-{{ $proyek->id }}">15,000,000</td>
                        @endforeach
                        <td>JUMLAH</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="right" ><b>Jumlah Biaya</b></td>
                        @foreach($proyeks as $proyek)
                        <td>JUMLAH_PER_PROYEK</td>
                        @endforeach
                        <td class="end-row">999.999.999</td>
                    </tr>
                    <tr>
                        <td class="right"><b>Laba</b></td>
                        @foreach($proyeks as $proyek)
                        <td>LABA_PER_PROYEK</td>
                        @endforeach
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
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
.content {
    font-size: 12px;
}
</style>
@endsection

@section('js')
<script src="https://unpkg.com/autonumeric"></script>
<script>
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
            // var html = '<input type="text" value="' + val + '">'
            // td.html(html);
            // console.log(html);
            // console.log(id_proyek);
        })
        var form = '<form method="post" action="{{ route("update_anggaran") }}">\
                    @csrf';
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