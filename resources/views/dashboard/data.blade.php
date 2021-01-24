@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Data')

@section('content_header')
<div class="row">
    <div class="col-md-8">
        <h5 class="pl-3"><b>DAFTAR AKUN & RANGE</b></h5>
    </div>
    @if(!empty(Auth::user()->id_perusahaan))
    <div class="col-md-4">
        <button class="btn btn-sm btn-primary float-right m-1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah</button>
        <!-- <button class="btn btn-sm btn-primary float-right m-1"><i class="fas fa-pencil-alt"></i> Ubah</button> -->
    </div>
    @endif
</div>
@endsection

@section('content')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@if(!empty(Auth::user()->id_perusahaan))
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
                            @foreach($akun_neraca_saldos as $akun_neraca_saldo)
                            <tr id="table-neraca" name="table-neraca">
                                <td id="nama" style="width: 70%;">{{ $akun_neraca_saldo['nama'] }}</td>
                                <td id="saldo" style="width: 30%;">{{ $akun_neraca_saldo['saldo'] }}</td>
                            </tr>
                            @endforeach
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
                            @foreach($pemasoks as $pemasok)
                            <tr id="table-pemasok" name="table-pemasok">
                                <td id="nama" style="width: 30%;">{{ $pemasok['nama'] }}</td>
                                <td id="jenis" style="width: 70%;">{{ $pemasok['jenis'] }}</td>
                            </tr>
                            @endforeach
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
                                <th >Akun</th>
                                <th >Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyeks as $proyek)
                            <tr id="table-proyekan" name="table-proyekan">
                                <td id="nama" style="width: 30%;">{{ $proyek['nama'] }}</td>
                                <td id="jenis" style="width: 70%;">{{ $proyek['jenis'] }}</td>
                            </tr>
                            @endforeach
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
                            <!-- @if($akun_transaksi_kantors->isEmpty())
                                <tr><td colspan="2" class="bg-light">Data masih kosong.</td></tr>
                            @endif -->
                            @foreach($akun_transaksi_kantors as $akun_transaksi_kantor)
                            <tr id= "table-kantor" name="table-kantor">
                                <td id="nama">{{ $akun_transaksi_kantor['nama'] }}</td>
                                <td id="jenis">{{ $akun_transaksi_kantor['jenis'] }}</td>
                            </tr>
                            @endforeach
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
                            @foreach($akun_transaksi_proyeks as $akun_transaksi_proyek)
                            <tr id="table-proyek" name="table-proyek">
                                <td id="nama">{{ $akun_transaksi_proyek['nama'] }}</td>
                                <td id="jenis">{{ $akun_transaksi_proyek['jenis'] }}</td>
                            </tr>
                            @endforeach
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
        <form id="form-akun-all" method="POST" action="{{ route('form_neraca') }}">
            @csrf
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
                    <input name="n_nama" type="text" id="nama-akun" class="form-control">
                </div>
                <div class="form-group">
                    <label for="saldo-akun">Saldo (Rp)</label>
                    <input autocomplete="off" type="text" name="n_saldo" id="saldo-akun" class="form-control">
                </div>
            </div>
            <div id="form-transaksi" style="display: none;">
                <div class="form-group">
                    <label for="nama-transaksi">Nama Transaksi</label>
                    <input name="at_nama" type="text" id="nama-transaksi" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jenis-transaksi">Jenis Transaksi</label>
                    <input name="at_jenis" type="text" id="nama-transaksi" class="form-control">
                </div>
            </div>
            <div id="form-pemasok" style="display: none;">
                <div class="form-group">
                    <label for="nama-perusahaan">Nama Perusahaan</label>
                    <input name="pe_kode" type="text" id="nama-perusahaan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama-barang">Barang yang dipasok</label>
                    <input name="pe_nama" type="text" id="nama-barang" class="form-control">
                </div>
            </div>
            <div id="form-proyek" style="display: none;">
                <div class="form-group">
                    <label for="nama-pemilik-proyek">Pemilik Proyek</label>
                    <input name="pr_kode" type="text" id="nama-pemilik-proyek" class="form-control">
                </div>
                <div class="form-group">
                    <label for="nama-proyek">Nama Proyek</label>
                    <input name="pr_nama" type="text" id="nama-proyek" class="form-control">
                </div>
            </div>
        </form>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" form="form-akun-all" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
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
                    $('#form-neraca').hide();
                    $('#form-transaksi').show();
                    $('#form-pemasok').hide();
                    $('#form-proyek').hide();
                    $('#form-akun-all').prop('action', "{{ route('form_transaksi_kantor') }}");
                    break;
                case "Akun Transaksi Proyek":
                    $('#form-neraca').hide();
                    $('#form-transaksi').show();
                    $('#form-pemasok').hide();
                    $('#form-proyek').hide();
                    $('#form-akun-all').prop('action', "{{ route('form_transaksi_proyek') }}");
                    break;
                case "Pemasok": 
                    $('#form-neraca').hide();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').show();
                    $('#form-proyek').hide();
                    $('#form-akun-all').prop('action', "{{ route('form_pemasok') }}");
                    break;
                case "Proyek":
                    $('#form-neraca').hide();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').hide();
                    $('#form-proyek').show();
                    $('#form-akun-all').prop('action', "{{ route('form_proyek') }}");
                    break;
                default:
                    $('#form-neraca').show();
                    $('#form-transaksi').hide();
                    $('#form-pemasok').hide();
                    $('#form-proyek').hide();
                    $('#form-akun-all').prop('action', "{{ route('form_neraca') }}");
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
<script src="{{ asset('js/bootstable-data.js') }}"></script>

@endsection
