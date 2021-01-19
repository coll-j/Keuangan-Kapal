@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Data')

@section('content_header')
<div class="row">
    <div class="col-md-8">
        <h5 class="pl-3"><b>DAFTAR AKUN & RANGE</b></h5>
    </div>
    <div class="col-md-4">
        <button class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button>
        <!-- <button class="btn btn-sm btn-primary float-right m-1"><i class="fas fa-pencil-alt"></i> Ubah</button> -->
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 d-inline-block pl-3">
        <div class="card" style="min-height: 100%;">
            <div class="card-header">
                <h6 class="pt-1">Akun Neraca & Saldo</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <!-- Table Akun -->
                    <table id="table-neraca" class="table table-striped table-bordered table-condensed table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kas</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Bank</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Piutang Usaha</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Kendaraan</td>
                                <td>99.999</td>
                            </tr>
                            <tr>
                                <td>Peralatan Kantor</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Akumulasi Penyusutan Aset</td>
                                <td>9.999</td>
                            </tr>
                            <tr>
                                <td>Utang Usaha</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Utang Bank</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Modal</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Saldo Laba</td>
                                <td>999.999</td>
                            </tr>
                            <tr>
                                <td>Laba (Rugi) Berjalan</td>
                                <td>999.999</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- END Table akun -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height: 48.25%;">
            <div class="card-header">
                <h6 class="pt-1">Pemasok</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-pemasok" class="table table-striped table-bordered table-condensed table-sm">
                        <thead style="display: none;">
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%;">PT. Kayu A</td>
                                <td style="width: 60%">Pemasok Material Kayu</td>
                            </tr>
                            <tr>
                                <td>PT. Kayu</td>
                                <td>Pemasok Material Besi</td>
                            </tr>
                            <tr>
                                <td>PT. C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>CV. Udud</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                            <tr>
                                <td>C</td>
                                <td>Pemasok Perlengkapan Lainnya</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card" style="height: 48.25%;">
            <div class="card-header">
                <h6 class="pt-1">Proyek</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-proyekan" class="table table-striped table-bordered table-condensed table-sm">
                        <thead style="display: none;">
                            <tr>
                                <th>Akun</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 40%;">Pak Saikhu</td>
                                <td style="width: 60%">Kapal 1</td>
                            </tr>
                            <tr>
                                <td>Pak Muhtadin</td>
                                <td>Kapal 2</td>
                            </tr>
                            <tr>
                                <td>Pak Saikhu</td>
                                <td>Kapal 3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row pt-4 pb-4">
    <div class="col-md-6 d-inline pl-3">
        <div class="card">
            <div class="card-header">
                <h6>Akun Transaksi Kantor</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <!-- Table Akun -->
                    <table id="table-kantor" class="table table-striped table-bordered table-condensed table-sm">
                        <thead class="thead-light">
                            <th style="width: 70%;">Akun</th>
                            <th style="width: 30%;">Ket.</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Biaya Administrasi Umum</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Bunga Pinjaman</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Gaji Karyawan</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Listrik</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Penyusutan Aset</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Rumah Tangga Kantor</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Sewa Kantor</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Telepon/Internet</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Pembayaran Utang Bank</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Perawatan/Pemeliharaan Aset</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Tambahan Dana Dari Bank</td>
                                <td>Masuk</td>
                            </tr>
                            <tr>
                                <td>Tambahan Dana Ke Kas</td>
                                <td>Masuk</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- END Table akun -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 d-inline">
        <div class="card">
            <div class="card-header">
                <h6>Akun Transaksi Proyek</h6>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper">
                    <table id="table-proyek" class="table table-striped table-bordered table-condensed table-sm">
                        <thead class="thead-light">
                            <th style="width: 70%;">Akun</th>
                            <th style="width: 30%;">Ket.</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Biaya Administrasi dan Umum</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya lain-lain (tak terduga)</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Listrik</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Material</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Pengawas</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Persiapan dan Perizinan</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Sewa Alat</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Tenaga Kerja</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Pembayaran Utang</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Biaya Sewa Lahan</td>
                                <td>Keluar</td>
                            </tr>
                            <tr>
                                <td>Pendapatan Proyek</td>
                                <td>Masuk</td>
                            </tr>
                            <tr>
                                <td>Penerimaan Piutang Proyek</td>
                                <td>Masuk</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <label for="jenis-akun">Kategori</label>
                <select class="form-control" id="jenis-akun">
                <option>Akun Neraca & Saldo</option>
                <option>Akun Transaksi Kantor</option>
                <option>Akun Transaksi Proyek</option>
                <option>Pemasok</option>
                <option>Proyek</option>
                </select>
            </div>
            <div id="form-neraca">
                <div class="form-group">
                    <label for="nama-akun">Nama Akun</label>
                    <input type="text" id="nama-akun" class="form-control">
                </div>
                <div class="form-group">
                    <label for="saldo-akun">Saldo (Rp)</label>
                    <input autocomplete="off" type="text" id="saldo-akun" class="form-control">
                </div>
            </div>
            <div id="form-transaksi" style="display: none;">
                <div class="form-group">
                    <label for="nama-transaksi">Nama Transaksi</label>
                    <input type="text" id="nama-transaksi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jenis-transaksi">Jenis Transaksi</label>
                    <select class="form-control" id="jenis-transaksi">
                    <option>Keluar</option>
                    <option>Masuk</option>
                    </select>
                </div>
            </div>
            <div id="form-pemasok" style="display: none;">
                <div class="form-group">
                    <label for="nama-perusahaan">Nama Perusahaan</label>
                    <input type="text" id="nama-perusahaan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama-barang">Barang yang dipasok</label>
                    <input type="text" id="nama-barang" class="form-control">
                </div>
            </div>
            <div id="form-proyek" style="display: none;">
                <div class="form-group">
                    <label for="nama-pemilik-proyek">Pemilik Proyek</label>
                    <input type="text" id="nama-pemilik-proyek" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama-proyek">Nama Proyek</label>
                    <input type="text" id="nama-proyek" class="form-control">
                </div>
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

@endsection

@section('js')
<script src="https://unpkg.com/autonumeric"></script>
<script>
    $(document).ready(function() {
        $('table').SetEditable();
        new AutoNumeric('#saldo-akun');
        $('#table-neraca').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });

        $('#table-kantor').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });

        $('#table-proyek').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 300,
            scrollCollapse    : true,
            info        : false,
        });
        
        $('#table-pemasok').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 100,
            scrollCollapse    : true,
            info        : false,
            sorting: false,
        });

        $('#table-proyekan').DataTable({
            paging      : false,
            searching   : false,
            scrollY : 100,
            scrollCollapse    : true,
            info        : false,
            sorting: false,
        });

        $('#jenis-akun').change(function(){
            var selected = $("#jenis-akun").find("option:selected").text();
            // console.log();
            switch(selected){
                case "Akun Transaksi Kantor":
                case "Akun Transaksi Proyek":
                    $('#form-neraca').hide();
                    $('#form-transaksi').show();
                    $('#form-pemasok').hide();
                    $('#form-proyek').hide();
                    break;
                case "Pemasok": 
                    $('#form-neraca').hide();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').show();
                    $('#form-proyek').hide();
                    break;
                case "Proyek":
                    $('#form-neraca').hide();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').hide();
                    $('#form-proyek').show();
                    break;
                default:
                    $('#form-neraca').show();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').hide();
                    $('#form-proyek').hide();
                    break;
            }
        });

        $(document).on('shown.lte.pushmenu collapsed.lte.pushmenu', function() {
            console.log("hey gamtenk");
            setTimeout(function(){
                $.fn.dataTable.tables( {api: true} ).columns.adjust();
            }, 300);
        });
    } );
</script>
<script src="{{ asset('js/bootstable.js') }}"></script>

@endsection
