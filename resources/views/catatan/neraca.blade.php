@extends('adminlte::page')

@section('title', 'Neraca')

@section('content_header')
<h5 class="pl-3"><b>NERACA</b></h5>
@endsection

@section('content')
<div class="card card-outline">
    <div class="card-body box-profile">
        <h4 class="text-center">PT. XYZ</h4>
        <div class="d-flex justify-content-center mb-3">
            <input name="daterange" type="text" value="{{ $date_range ?? '-- pilih tanggal --' }}" style="width: 250px;" class="form-control text-center">
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
                            <td style="border-top: 1px solid black; width: 65%; padding: 0px 5px;" class="font-weight-bold">Aset Lancar</td>
                            <td style="border-top: 1px solid black; width: 35%;"></td>
                        </tr>
                        @foreach(array_keys($aset_lancar) as $nama_aset)
                        <tr>
                            <td style="text-indent: 20px;">{{$nama_aset}}</td>
                            <td>{{number_format($aset_lancar[$nama_aset], 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td style="">Total Aset Lancar</td>
                            <td>{{ number_format(array_sum($aset_lancar), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 65%; padding: 0px 5px;" class="font-weight-bold">Aset Tetap</td>
                            <td style="border-top: 1px solid black; width: 35%;"></td>
                        </tr>
                        @foreach(array_keys($aset_tetap) as $nama_aset)
                        <tr>
                            <td style="text-indent: 20px;">{{ $nama_aset }}</td>
                            <td>{{number_format($aset_tetap[$nama_aset], 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td style="">Total Aset Tetap</td>
                            <td>{{ number_format(array_sum($aset_tetap), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 65%;" class="font-weight-bold">Total Aset Keseluruhan</td>
                            <td style="border-top: 1px solid black; width: 35%;" class="font-weight-bold">{{ number_format(array_sum($aset_lancar) + array_sum($aset_tetap), 2, '.', ',') }}</td>
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
                            <td style="border-top: 1px solid black; width: 65%; padding: 0px 5px;" class="font-weight-bold">Kewajiban Lancar</td>
                            <td style="border-top: 1px solid black; width: 35%;"></td>
                        </tr>
                        @foreach(array_keys($kewajiban_lancar) as $nama_kewajiban)
                        <tr>
                            <td style="text-indent: 20px;">{{ $nama_kewajiban }}</td>
                            <td>{{number_format($kewajiban_lancar[$nama_kewajiban], 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td style="">Total Kewajiban Lancar</td>
                            <td>{{ number_format(array_sum($kewajiban_lancar), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 65%; padding: 0px 5px;" class="font-weight-bold">Kewajiban Jangka Panjang</td>
                            <td style="border-top: 1px solid black; width: 35%;"></td>
                        </tr>
                        @foreach(array_keys($kewajiban_jangka_panjang) as $nama_kewajiban)
                        <tr>
                            <td style="text-indent: 20px;">{{ $nama_kewajiban }}</td>
                            <td>{{number_format($kewajiban_jangka_panjang[$nama_kewajiban], 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td style="">Total Kewajiban Jangka Panjang</td>
                            <td>{{ number_format(array_sum($kewajiban_jangka_panjang), 2, '.', ',') }}</td>
                        </tr>
                        <tr>
                            <td style="border-top: 1px solid black; width: 65%; padding: 0px 5px;" class="font-weight-bold">Ekuitas</td>
                            <td style="border-top: 1px solid black; width: 35%;"></td>
                        </tr>
                        @foreach(array_keys($ekuitas) as $nama_ekuitas)
                        <tr>
                            <td style="text-indent: 20px;">{{ $nama_ekuitas }}</td>
                            <td>{{number_format($ekuitas[$nama_ekuitas], 2, '.', ',')}}</td>
                        </tr>
                        @endforeach
                        <tr class="font-weight-bold">
                            <td style="">Total Ekuitas</td>
                            <td>{{ number_format(array_sum($ekuitas), 2, '.', ',') }}</td>
                        </tr>
                        <!-- <tr class="font-weight-bold">
                            <td style=""><br/></td>
                            <td><br/></td>
                        </tr> -->
                        <tr class="mt-5">
                            <td style="border-top: 1px solid black; width: 65%;" class="font-weight-bold">Total Kewajiban dan Ekuitas</td>
                            <td style="border-top: 1px solid black; width: 35%;" class="font-weight-bold">
                            {{ number_format(array_sum($kewajiban_lancar) + array_sum($kewajiban_jangka_panjang) + array_sum($ekuitas), 2, '.', ',') }}
                            </td>
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
    
    .content {
    font-size: 12px;
    }
</style>
@endsection

@section('js')
<script>
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
        var url = '/neraca/' + encodeURIComponent(all);
        console.log(all);
        console.log(url);
        window.location.href = url;
        // console.log("A new date selection was made: " + start + ' to ' + end);
    });
});
</script>
@endsection