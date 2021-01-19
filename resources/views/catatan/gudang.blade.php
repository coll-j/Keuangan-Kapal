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
                    <a href="#"><button type="button" class="btn btn-sm btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
                    <!-- <a href="#"><button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></a> -->
                </div>
                <table id="table1"class="table table-stripped table-hover dataTable table-condensed table-sm">
                <thead class="thead-light">
                    <th style="width: 40%">Nama Barang</th>
                    <th style="width: 20%">Satuan</th>
                    <th style="width: 20%">Jumlah</th>
                    <th style="width: 20%">Harga Satuan (Rp)</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Kayu</td>
                        <td>Buah</td>
                        <td>100</td>
                        <td>500,000</td>
                    </tr>
                    <tr>
                        <td>Oli</td>
                        <td>Liter</td>
                        <td>100</td>
                        <td>500,000</td>
                    </tr>
                    <tr>
                        <td>Tanah</td>
                        <td>Hektar</td>
                        <td>100</td>
                        <td>500,000</td>
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

<!-- Modal -->
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
        <form>
            <div class="form-group">
                <label for="nama-akun">Nama Barang</label>
                <input type="text" id="nama-akun" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis-akun">Satuan</label>
                <select class="form-control" id="jenis-akun">
                <option>Buah</option>
                <option>Liter</option>
                <option>Hektar</option>
                <option>Kilogram</option>
                <option>Meter</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo-akun">Jumlah</label>
                <input autocomplete="off" type="number" id="saldo-akun" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama-transaksi">Harga Satuan</label>
                <input type="text" id="nama-transaksi" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@endsection

@section('js')
<script>
    console.log('Hi!'); 
</script>
@endsection