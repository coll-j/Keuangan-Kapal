@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Proyek')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI PROYEK</b></h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3 mb-3">
            <div class="col">
                <h5>Catatan Transaksi Proyek</h5>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="01/01/2018" type="text" style="width: 180px;" class="form-control text-center">
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="row justify-content-start">
                    <a href="#"><button type="button" class="btn btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
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
            <table id="table-transaksi-proyek" class="display table table-hover table-condensed table-sm dataTable" style="min-width: 2000px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Transaksi</th>
                        <th>Pemasok</th>
                        <th>Kode Proyek</th>
                        <th>Proyek</th>
                        <th>Kas/Bank</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Dibayar/Diterima</th>
                        <th>Sisa</th>
                        <th>Utang/Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>1/2/2019</td>
                        <td>Biaya Material</td>
                        <td>PT. Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>PT. Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
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
                <label for="jenis-akun">Jenis Akun</label>
                <select class="form-control" id="jenis-akun">
                <option>Biaya Administrasi dan Umum</option>
                <option>Biaya Lain-lain (tak terduga)</option>
                <option>Biaya Listrik</option>
                <option>Biaya Material</option>
                <option>Biaya Pengawas</option>
                <option>Biaya Pemasaran</option>
                <option>Biaya Persiapan dan Perijinan</option>
                <option>Biaya Sewa Alat</option>
                <option>Biaya Telepon/Internet</option>
                <option>Biaya Tenaga Kerja</option>
                <option>Pembayaran Utang</option>
                <option>Pendapatan Proyek</option>
                <option>Penerimaan Piutang Proyek</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo-akun">Pemasok</label>
                <select class="form-control" id="kode-pemasok">
                <option>PT. Kayu A</option>
                <option>PT. Kayu</option>
                <option>PT. C</option>
                <option>CV. Udud</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo-akun">Proyek</label>
                <select class="form-control" id="kode-proyek">
                <option>Pak Saikhu</option>
                <option>Pak Muhtadin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kas-bank">Jenis Transaksi</label>
                <select class="form-control" id="kas-bank">
                <option>Kas</option>
                <option>Bank</option>
                </select>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="nama-transaksi">Jumlah</label>
                    <input type="text" id="jumlah-transaksi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama-transaksi">Dibayar/Diterima</label>
                    <input type="text" id="jumlah-transaksi-dibayar" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="kas-bank">Utang/Piutang</label>
                <select class="form-control" id="utang-piutang">
                <option>Utang</option>
                <option>Piutang</option>
                </select>
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

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('table').SetEditable();

        $('#table-transaksi-proyek').DataTable({
            'columnDefs': [
                { "width": "300px", "targets": 3 }
            ],
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
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });
    });
</script>
<script src="{{ asset('js/bootstable-transaksi-proyek.js') }}"></script>

@endsection