@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Kantor')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI KANTOR</b></h5>
@endsection

@section('content')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@if(!empty(Auth::user()->id_perusahaan))
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3 mb-3">
            <div class="col">
                <h5>Catatan Transaksi Kantor</h5>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="01/01/2018" type="text" style="width: 180px;" class="form-control text-center">
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="row justify-content-start">
                    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                    <a href="#"><button type="button" class="btn btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
                    @endif
                    <!-- <a href="#"><button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button></a> -->
                </div>
            </div>
            <div class="col-sm">
                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Kas </b>
                    </div>
                    <div class=" col-3 text-right">
                        5,550,000
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Bank </b>
                    </div>
                    <div class="col-3 text-right">
                        507,280,000
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body " style="max-width: 1200px;">
        <div class="dataTables_wrapper">
            <table id="table-transaksi-proyek" class="display table table-stripped table-hover table-condensed table-sm dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Kas/Bank</th>
                        <th scope="col">Keluar/Masuk</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi_kantors as $transaksi_kantor)
                    <tr id="table-transaksi-kantor" name="table-transaksi-kantor">
                        <td id="tgl_transaksi">{{ $transaksi_kantor['tgl_transaksi'] }}</td>
                        <td id="nama_transaksi">{{ $transaksi_kantor['nama_transaksi'] }}</td>
                        <td id="keterangan">{{ $transaksi_kantor['keterangan'] }}</td>
                        <td id="jenis_simpanan">{{ $transaksi_kantor['jenis_simpanan'] }}</td>
                        <td id="jenis_transaksi">{{ $transaksi_kantor['jenis_transaksi'] }}</td>
                        <td id="jumlah">{{ number_format($transaksi_kantor['jumlah'], 2, '.', ',') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                <label for="nama-akun">Tanggal</label>
                <input name="daterange" value="01/01/2018" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis-akun">Jenis Transaksi</label>
                <select class="form-control" id="jenis-akun">
                <option>Biaya Gaji Karyawan</option>
                <option>Biaya Administrasi Umum</option>
                <option>Biaya Bunga Pinjaman</option>
                <option>Tambahan Dana dari Bank</option>
                <option>Tambahan Dana ke Kas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo-akun">Keterangan</label>
                <input autocomplete="off" type="text" id="saldo-akun" class="form-control">
            </div>
            <div class="form-group">
                <label for="kas-bank">Jenis Transaksi</label>
                <select class="form-control" id="kas-bank">
                <option>Kas</option>
                <option>Bank</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama-transaksi">Jumlah</label>
                <input type="text" id="nama-transaksi" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
table tr:first-child{
  counter-reset: rowNumber;
}
table tr {
  counter-increment: rowNumber;
}
table tr td:first-child::before {
  content: counter(rowNumber);
  min-width: 1em;
  margin-right: 0.5em;
}
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        var role = <?php echo Auth::user()->role; ?>;

        if(role == 1)
        {
            $('table').SetEditable();
        }
        $('#table-transaksi-proyek').DataTable({
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
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });


    });
</script>
<script src="{{ asset('js/bootstable.js') }}"></script>

@endsection