@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Kantor')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI KANTOR</b></h5>
@endsection

@section('content')
<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
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
            <input name="daterange" value="{{ $date_range ?? '-- pilih tanggal --' }}" type="text" style="width: 250px;" class="form-control text-center">
        </div>
        <div class="row">
            <div class="col-sm">
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <div class="row justify-content-start pl-2 pt-2">
                    <a href="#"><button type="button" class="btn btn-sm btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
                </div>
                @endif
            </div>
            <div class="col-sm">
                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Kas </b>
                    </div>
                    <div class=" col-3 text-right">
                        {{ number_format($kas_sum, 2, '.', ',') }}
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Bank </b>
                    </div>
                    <div class="col-3 text-right">
                        {{ number_format($bank_sum, 2, '.', ',') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body " style="max-width: 1200px;">
        <div class="dataTables_wrapper">
            <table id="table-transaksi-kantor" class="display table table-stripped table-hover table-condensed table-sm dataTable">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Transaksi</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Kas/Bank</th>
                        <th scope="col">Keluar/Masuk</th>
                        <th scope="col">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatan_tr_kantors as $catatan_tr_kantor)
                    <tr id="{{ $catatan_tr_kantor->id }}">
                        <td>{{$catatan_tr_kantor->tgl_transaksi}}</td>
                        <td>{{$catatan_tr_kantor->akun_tr_kantor->nama}}</td>
                        <td>{{$catatan_tr_kantor->keterangan}}</td>
                        <td>{{$catatan_tr_kantor->akun_neraca->nama}}</td>
                        <td>{{$catatan_tr_kantor->akun_tr_kantor->jenis}}</td>
                        <td>{{ number_format($catatan_tr_kantor->jumlah, 2, '.', ',') }}</td>
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

@if(Auth::user()->role == 1 || Auth::user()->role == 2)
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
      <form id="add-transaksi" method="post" action="{{ route('create_transaksi_kantor') }}">
        @csrf
            <div class="form-group">
                <label for="nama-akun">Tanggal</label>
                <input id="daterange-form" name="tgl_transaksi" value="01/01/2018" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis-akun">Jenis Transaksi</label>
                <select class="form-control" id="jenis-akun" name="jenis_transaksi" required>
                <option disabled selected value> -- pilih jenis transaksi -- </option>
                @foreach($akun_tr_kantors as $akun_tr_kantor)
                <option value="{{ $akun_tr_kantor->id }}">{{ $akun_tr_kantor->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input autocomplete="off" type="text" id="keterangan" name="keterangan"  class="form-control">
            </div>
            <div class="form-group">
                <label for="kas-bank">Kas/Bank</label>
                <select class="form-control" id="kas-bank" name="akun_neraca" required>
                <option disabled selected value> -- pilih akun -- </option>
                @foreach($akun_neracas as $akun_neraca)
                <option value="{{ $akun_neraca->id }}">{{ $akun_neraca->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="jumlah-transaksi">Jumlah (Rp)</label>
                    <input type="text" id="jumlah-transaksi" class="form-control" name="jumlah_transaksi" required>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="add-transaksi">Simpan</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="edit-transaksi" method="post" action="{{ route('update_transaksi_kantor') }}">
        @csrf
            <input id="edit-id" name="id" type="hidden" class="form-control">
            <div class="form-group">
                <label for="nama-akun">Tanggal</label>
                <input id="daterange-edit" name="tgl_transaksi" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis-akun">Jenis Transaksi</label>
                <select class="form-control" id="edit-jenis-akun" name="jenis_transaksi" required>
                <option disabled selected value> -- pilih jenis transaksi -- </option>
                @foreach($akun_tr_kantors as $akun_tr_kantor)
                <option value="{{ $akun_tr_kantor->id }}">{{ $akun_tr_kantor->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input autocomplete="off" type="text" id="edit-keterangan" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
                <label for="kas-bank">Kas/Bank</label>
                <select class="form-control" id="edit-kas-bank" name="akun_neraca" required>
                <option disabled selected value> -- pilih akun -- </option>
                @foreach($akun_neracas as $akun_neraca)
                <option value="{{ $akun_neraca->id }}">{{ $akun_neraca->nama }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="edit-jumlah-transaksi">Jumlah (Rp)</label>
                    <input type="text" id="edit-jumlah-transaksi" class="form-control" name="jumlah_transaksi" required>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="edit-transaksi">Simpan</button>
      </div>
    </div>
  </div>
</div>
@endif
@endif
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
.content {
    font-size: 12px;
}
</style>
<meta name="csrf-token" content="{{ Session::token() }}"> 
@endsection

@section('js')
<script src="https://unpkg.com/autonumeric"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var role = <?php echo Auth::user()->role; ?>;

        if(role == 1)
        {
            $('table').SetEditable();
        }

        if(role == 1 || role == 2)
        {
            new AutoNumeric('#jumlah-transaksi');
        }

        var columnDefs = [];
        if(role == 1){
            columnDefs = [
                { "width": "20px", "targets": [4,5,6,8,9,13] },
                { "targets": [2, 3, 4, 5, 6, 7, 8], "orderable": false }
            ]
        }
        else{
            columnDefs = [
                { "width": "20px", "targets": [3,4,5,7,8,12] },
                { "targets": [1, 2, 3, 4, 5, 6, 7], "orderable": false }
            ]
        }

        $('#table-transaksi-kantor').DataTable({
            'columnDefs': columnDefs,
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': false,
            'autoWidth': false,
            'scrollX': true,
        });
    });
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
            var url = '/transaksi_kantor/' + encodeURIComponent(all);
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
<script src="{{ asset('js/bootstable-transaksi-kantor.js') }}"></script>

@endsection