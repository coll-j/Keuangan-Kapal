@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Kantor')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI KANTOR</b></h5>
@endsection

@section('content')
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
                    <a href="#"><button type="button" class="btn btn-primary mr-2 " data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button></a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>1/2/2019</td>
                        <td>Uang muka Sewa Kantor</td>
                        <td>Untuk sewa kantor 2 tahun</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>120,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>1/3/2019</td>
                        <td>Biaya Gaji Karyawan</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>15,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>1/7/2019</td>
                        <td>Biaya Telepon/Internet</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>1,975,000</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>1/8/2019</td>
                        <td>Pembayaran Utang Bank</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>10,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>1/8/2019</td>
                        <td>Biaya Bunga Pinjaman</td>
                        <td>bulan Januari 2019n</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>3,500,000</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>1/10/2019</td>
                        <td>Biaya Rumah Tangga Kantor</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>2,500,000</td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <td>1/22/2019</td>
                        <td>Biaya Administrasi Umum</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>250,000</td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <td>1/29/2019</td>
                        <td>Perawatan/Pemeliharaan Aset</td>
                        <td>bulan Januari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>1,250,000</td>
                    </tr>
                    <tr>
                        <th scope="row">9</th>
                        <td>1/31/2019</td>
                        <td>Biaya Rumah Tangga Kantor</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>1,725,000</td>
                    </tr>
                    <tr>
                        <th scope="row">10</th>
                        <td>2/3/2019</td>
                        <td>Biaya Gaji Karyawan</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>15,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">11</th>
                        <td>2/5/2019</td>
                        <td>Biaya Listrik</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>3,925,000</td>
                    </tr>
                    <tr>
                        <th scope="row">12</th>
                        <td>2/5/2019</td>
                        <td>Biaya Telepon/Internet</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>2,025,000</td>
                    </tr>
                    <tr>
                        <th scope="row">13</th>
                        <td>2/8/2019</td>
                        <td>Pembayaran Utang Bank</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>10,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">14</th>
                        <td>2/8/2019</td>
                        <td>Biaya Bunga Pinjaman</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>3,500,000</td>
                    </tr>
                    <tr>
                        <th scope="row">15</th>
                        <td>2/15/2019</td>
                        <td>Biaya Rumah Tangga Kantor</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>4,125,000</td>
                    </tr>
                    <tr>
                        <th scope="row">16</th>
                        <td>2/28/2019</td>
                        <td>Tambahan Dana ke Kas</td>
                        <td>bulan Februari 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>5,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">17</th>
                        <td>2/28/2019</td>
                        <td>Tambahan Dana dari Bank</td>
                        <td>bulan Februari 2019</td>
                        <td>Kas</td>
                        <td>Masuuk</td>
                        <td>5,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">18</th>
                        <td>3/3/2019</td>
                        <td>Biaya Gaji Karyawan</td>
                        <td>bulan Maret 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>15,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">19</th>
                        <td>3/4/2019</td>
                        <td>Biaya Listrik</td>
                        <td>bulan Maret 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>2,195,000</td>
                    </tr>
                    <tr>
                        <th scope="row">20</th>
                        <td>3/5/2019</td>
                        <td>Biaya Telepon/Internet</td>
                        <td>bulan Maret 2019</td>
                        <td>Kas</td>
                        <td>Keluar</td>
                        <td>1,975,000</td>
                    </tr>
                    <tr>
                        <th scope="row">21</th>
                        <td>3/8/2019</td>
                        <td>Pembayaran Utang Bank</td>
                        <td>bulan Maret 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>10,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">22</th>
                        <td>3/8/2019</td>
                        <td>Biaya Bunga Pinjaman</td>
                        <td>bulan Maret 2019</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>3,500,000</td>
                    </tr>
                    <tr>
                        <th scope="row">23</th>
                        <td>3/21/2019</td>
                        <td>Biaya Rumah Tangga Kantor</td>
                        <td>bulan Maret 2019</td>
                        <td>Kas</td>
                        <td>Keluar</td>
                        <td>1,925,000</td>
                    </tr>
                    <tr>
                        <th scope="row">24</th>
                        <td>3/25/2019</td>
                        <td>Biaya Administrasi Umum</td>
                        <td>bulan Maret 2019</td>
                        <td>Kas</td>
                        <td>Keluar</td>
                        <td>725,000</td>
                    </tr>
                    <tr>
                        <th scope="row">25</th>
                        <td>3/31/2019</td>
                        <td>Biaya Penyusutan Aset</td>
                        <td>periode Jan s.d. Maret 2019</td>
                        <td> </td>
                        <td>Keluar</td>
                        <td>15,000,000</td>
                    </tr>
                    <tr>
                        <th scope="row">26</th>
                        <td>3/31/2019</td>
                        <td>Uang muka Sewa Kantor</td>
                        <td>periode Jan s.d. Maret 2019</td>
                        <td> </td>
                        <td>Keluar</td>
                        <td>15,000,000</td>
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
                <input type="text" id="nama-akun" class="form-control">
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
        <button type="button" class="btn btn-primary">Save changes</button>
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