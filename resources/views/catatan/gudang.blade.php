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
                <div class="row justify-content-start">
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <a href="#"><button type="button" class="btn btn-sm btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pemakaian Material</button></a>
                    @endif
                    <!-- <a href="#"><button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></a> -->
                </div>
                <table id="table1" class="table table-stripped table-hover dataTable table-condensed table-sm">
                    <thead class="thead-light">
                        <th style="width: 40%">Nama Barang</th>
                        <th style="width: 20%">Satuan</th>
                        <th style="width: 10%">Jumlah</th>
                        <th style="width: 10%">Jenis</th>
                        <th style="width: 20%">Harga Satuan (Rp)</th>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->satuan}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->harga_satuan}}</td>
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
table tr:first-child{
  counter-reset: rowNumber;
}
table tr {
  counter-increment: rowNumber;
}
table tr td:nth-child(2)::before {
  content: counter(rowNumber);
  min-width: 1em;
  margin-right: 0.5em;
}
</style>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var role = <?php echo Auth::user()->role; ?>;
        
        if(role == 1)
        {
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
<script src="{{ asset('js/bootstable.js') }}"></script>
@endsection