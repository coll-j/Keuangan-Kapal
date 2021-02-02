@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Proyek')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI PROYEK</b></h5>
@endsection

@section('content')
<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
@if(!empty(Auth::user()->id_perusahaan))
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3 mb-3">
            <div class="col">
                <h5>Catatan Transaksi Proyek</h5>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        <input name="daterange" type="text" value="{{ $date_range ?? '-- pilih tanggal --' }}" style="width: 250px;" class="form-control text-center">
        </div>
        <div class="row">
            <div class="col-sm">
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <div class="row justify-content-start">
                    <a href="#"><button type="button" class="btn btn-xs btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
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
            <table id="table-transaksi-proyek" class="display table table-hover table-condensed table-sm dataTable">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Pemasok</th>
                        <th>Nama Material</th>
                        <th>Jumlah</th>
                        <th>Satuan Material</th>
                        <th>Proyek</th>
                        <th>Kas/Bank</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Dibayar/Diterima</th>
                        <th>Sisa</th>
                        <th>Utang Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catatan_tr_proyeks as $catatan_tr_proyek)
                    <tr id="{{ $catatan_tr_proyek->id }}">
                        <td>{{$catatan_tr_proyek->tanggal_transaksi}}</td>
                        <td>{{$catatan_tr_proyek->akun_tr_proyek->nama}}</td>
                        <td>{{$catatan_tr_proyek->pemasok->nama ?? ''}}</td>
                        <td>{{$catatan_tr_proyek->nama_material}}</td>
                        <td>{{$catatan_tr_proyek->jumlah_material}}</td>
                        <td>{{$catatan_tr_proyek->satuan_material}}</td>
                        <td>{{$catatan_tr_proyek->proyek->jenis}}</td>
                        <td>{{$catatan_tr_proyek->akun_neraca->nama}}</td>
                        <td>{{$catatan_tr_proyek->akun_tr_proyek->jenis}}</td>
                        <td>{{ number_format($catatan_tr_proyek->jumlah, 2, '.', ',') }}</td>
                        <td>{{ number_format($catatan_tr_proyek->terbayar, 2, '.', ',') }}</td>
                        
                        <td>{{ number_format($catatan_tr_proyek->sisa, 2, '.', ',') }}</td>
                        <td>{{ $catatan_tr_proyek->jenis }}</td>
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
        <form id="add-transaksi" method="post" action="{{ route('create_transaksi_proyek') }}">
        @csrf
            <div class="form-group">
                <label for="nama-akun">Tanggal</label>
                <input id="daterange-form" name="tanggal_transaksi" value="01/01/2018" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis-akun">Jenis Transaksi</label>
                <select class="form-control" id="jenis-akun" name="jenis_transaksi" required>
                <option disabled selected value> -- pilih jenis transaksi -- </option>
                @foreach($akun_tr_proyeks as $akun_tr_proyek)
                <option value="{{ $akun_tr_proyek->id }}">{{ $akun_tr_proyek->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="saldo-akun">Pemasok <span class="text-muted">(opsional)</span></label>
                <select class="form-control" id="kode-pemasok" name="id_pemasok">
                <option disabled selected value> -- pilih pemasok -- </option>
                @foreach($pemasoks as $pemasok)
                <option value="{{ $pemasok->id }}">{{ $pemasok->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama-material">Nama Material <span class="text-muted">(opsional)</span></label>
                <input type="text" id="nama-material" name="nama_material" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah-material">Jumlah Material <span class="text-muted">(opsional)</span></label>
                <input type="number" id="jumlah-material" class="form-control" name="jumlah_material">
            </div>
            <div class="form-group">
                <label for="satuan-material">Satuan Material <span class="text-muted">(opsional)</span></label>
                <input type="text" id="satuan-material" name="satuan_material" class="form-control">
            </div>
            <div class="form-group">
                <label for="kode-proyek">Proyek</label>
                <select class="form-control" id="kode-proyek" name="id_proyek">
                <option disabled selected value required> -- pilih proyek -- </option>
                @foreach($proyeks as $proyek)
                <option value="{{ $proyek->id }}">{{ $proyek->jenis }}</option>
                @endforeach
                </select>
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
                    <input autocomplete="off" type="text" id="jumlah-transaksi" class="form-control" name="jumlah_transaksi" required>
                </div>
                <div class="form-group">
                    <label for="jumlah-transaksi-transaksi">Jumlah Dibayar/Diterima (Rp)</label>
                    <input autocomplete="off" type="text" id="jumlah-transaksi-dibayar" class="form-control" name="jumlah_dibayar" required>
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
        <form id="edit-transaksi" method="post" action="{{ route('update_transaksi_proyek') }}">
        @csrf
            <input id="edit-id" name="id" type="hidden" class="form-control">
            <div class="form-group">
                <label for="nama-akun">Tanggal</label>
                <input id="daterange-edit" name="tanggal_transaksi" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="edit-jenis-akun">Jenis Transaksi</label>
                <select class="form-control" id="edit-jenis-akun" name="jenis_transaksi" required>
                <option disabled selected value> -- pilih jenis transaksi -- </option>
                @foreach($akun_tr_proyeks as $akun_tr_proyek)
                <option value="{{ $akun_tr_proyek->id }}">{{ $akun_tr_proyek->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="edit-kode-pemasok">Pemasok <span class="text-muted">(opsional)</span></label>
                <select class="form-control" id="edit-kode-pemasok" name="id_pemasok">
                <option disabled selected value> -- pilih pemasok -- </option>
                @foreach($pemasoks as $pemasok)
                <option value="{{ $pemasok->id }}">{{ $pemasok->nama}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="edit-nama-material">Nama Material <span class="text-muted">(opsional)</span></label>
                <input type="text" id="edit-nama-material" name="nama_material" class="form-control">
            </div>
            <div class="form-group">
                <label for="edit-jumlah-material">Jumlah Material <span class="text-muted">(opsional)</span></label>
                <input type="number" id="edit-jumlah-material" class="form-control" name="jumlah_material">
            </div>
            <div class="form-group">
                <label for="edit-satuan-material">Satuan Material <span class="text-muted">(opsional)</span></label>
                <input type="text" id="edit-satuan-material" name="satuan_material" class="form-control">
            </div>
            <div class="form-group">
                <label for="edit-kode-proyek">Proyek</label>
                <select class="form-control" id="edit-kode-proyek" name="id_proyek">
                <option disabled selected value required> -- pilih proyek -- </option>
                @foreach($proyeks as $proyek)
                <option value="{{ $proyek->id }}">{{ $proyek->jenis }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="edit-kas-bank">Kas/Bank</label>
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
                    <input autocomplete="off" type="text" id="edit-jumlah-transaksi" class="form-control" name="jumlah_transaksi" required />
                </div>
                <div class="form-group">
                    <label for="edit-jumlah-transaksi-dibayar">Jumlah Dibayar/Diterima (Rp)</label>
                    <input autocomplete="off" type="text" id="edit-jumlah-transaksi-dibayar" class="form-control" name="jumlah_dibayar" required />
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
            new AutoNumeric('#jumlah-transaksi-dibayar');
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
        $('#table-transaksi-proyek').DataTable({
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
            var url = '/transaksi_proyek/' + encodeURIComponent(all);
            console.log(all);
            console.log(url);
            window.location.href = url;
            // console.log("A new date selection was made: " + start + ' to ' + end);
        });
        $('input[name="tanggal_transaksi"]').daterangepicker({
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
<script src="{{ asset('js/bootstable-transaksi-proyek.js') }}"></script>

@endsection