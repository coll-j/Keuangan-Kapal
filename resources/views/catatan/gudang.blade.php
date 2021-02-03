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
                <div class="d-flex justify-content-center">
                    <input name="daterange" value="{{ $date_range ?? '' }}" type="text" style="width: 250px;" class="form-control text-center">
                </div>
                <div class="row justify-content-start">
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <a href="#"><button type="button" class="btn btn-sm btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pemakaian Material</button></a>
                    @endif
                    <!-- <a href="#"><button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></a> -->
                </div>
                <table id="table1" class="table table-stripped table-hover dataTable table-condensed table-sm">
                    <thead class="thead-light">
                        <th style="width: 40%">Nama Barang</th>
                        <th style="width: 30%">Satuan</th>
                        <th style="width: 20%">Jumlah</th>
                        <th style="width: 10%">Jenis</th>

                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->satuan}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->jenis}}</td>
                        </tr>
                        @endforeach
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

@if(Auth::user()->role == 1 || Auth::user()->role == 2)
<!-- Modal create gudang-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-gudang" method="POST" action="{{route ('create_gudang')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <select class="form-control" id="nama_barang" name="id_parent">
                            @foreach($inventoris as $inventori)
                            <option value="{{ $inventori->id }}">{{$inventori->nama_barang}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input autocomplete="off" type="number" id="jumlah" class="form-control" name="jumlah" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="form-gudang">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
<style>
    .content {
        font-size: 12px;
    }
</style>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var role = <?php echo Auth::user()->role; ?>;

        if (role == 1) {
            $('table').SetEditable();
        }
        $('#table1').DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: false,
            autoWidth: false,
            //            'scrollX': true,
            scrollY: 300,
            scrollCollapse: true,
        });
    });
    console.log('Hi!');
</script>
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
            var url = '/gudang/' + encodeURIComponent(all);
            console.log(all);
            console.log(url);
            window.location.href = url;
            // console.log("A new date selection was made: " + start + ' to ' + end);
        });
        $('input[name="tgl_transaksi"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
            locale: {
                format: 'DD/MM/YYYY',
            }
        });
    });
</script>
<script src="{{ asset('js/bootstable-gudang.js') }}"></script>
@endsection