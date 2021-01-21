@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Profil Perusahaan')

@section('content_header')
<h5 class="pl-3">PROFIL PERUSAHAAN</h5>
@endsection

@section('content')
<div class="container h-100">
    @if(!empty(Auth::user()->kode_perusahaan) && !(is_null($perusahaan)))
    <div id="detail-perusahaan" class="row" >
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h1 class="text-center">{{ $perusahaan->nama_perusahaan }}</h1>
                    <p class="text-muted text-center" style="font-size: 12px;">(Id: {{ $perusahaan->kode_perusahaan }})</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Alamat</b> 
                                <a id="alamat" class="col">{{ $perusahaan->alamat }}</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Pemilik</b> 
                                <a id="pemilik" class="col">{{ $perusahaan->user->first()->name }}</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Email</b> 
                                <a id="email" class="col">{{ $perusahaan->email }}</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Website</b> 
                                <a target="_blank" href="http://{{ $perusahaan->website }}" id="web" class="col">{{ $perusahaan->website }}</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Telp/Fax</b> 
                                <a id="telp" class="col">{{ $perusahaan->telp }}</a>
                            </div>
                        </li>
                    </ul>

                    <a id="edit-perusahaan" href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
                    <a id="save-perusahaan" href="#" class="btn btn-primary btn-block" style="display: none;"><b>Save</b></a>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-7">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5>Anggota Perusahaan</h5>
                </div>
                <div class="card-header bg-light">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lihat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Undang</a></li>
                        <li class="nav-item"><a class="nav-link" href="#request" data-toggle="tab">Permintaan</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- <button class="btn btn-sm btn-primary float-left ml-1"><i class="fas fa-pencil-alt"></i></button> -->
                        <table id="table-member" class="display table table-hover table-condensed table-sm">
                            <thead class="thead-light">
                                <th style="width: 60%">Nama</th>
                                <th style="width: 40%">Jabatan</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dr. Angka</td>
                                    <td>Pemilik Perusahaan</td>
                                </tr>
                                <tr>
                                    <td>Prof. Mochamad Ashari</td>
                                    <td>CEO</td>
                                </tr>
                                <tr>
                                    <td>Dr. Ahmad Saikhu</td>
                                    <td>Manajer Proyek</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Manajer Proyek</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Akuntan</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Admin</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Akuntan</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Akuntan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="request">
                        <!-- <button class="btn btn-sm btn-primary float-left ml-1"><i class="fas fa-pencil-alt"></i></button> -->
                        <h5>Tab under construction...</h5>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="jabatan">
                                        <option>Pemilik</option>
                                        <option>Manajer Proyek</option>
                                        <option>Administrator</option>
                                        <option>Akuntan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    
                </div>
                <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    @else
    <div id="no-perusahaan" class="row">
        <div class="col text-center">
                <h2 class="my-5">Anda belum tergabung perusahaan</h2>
                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalJoin">Gabung Perusahaan</button>
                <h5 class="my-3">atau</h5>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Buat Perusahaan</button>
        </div>
    </div>
    @endif
    <!-- /.row -->
</div>

@if(empty(Auth::user()->kode_perusahaan))
<!-- Modal Create Company -->
<div class="modal fade" id="modalJoin" tabindex="-1" role="dialog" aria-labelledby="modalJoinLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalJoinLabel">Gabung Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form>
            <div class="form-group">
                <label for="kode-perusahaan">Masukkan Kode Perusahaan</label>
                <input type="text" id="kode-perusahaan" class="form-control" placeholder="contoh: 3uyu90rw1r">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Company -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCreateLabel">Buat Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="create-form" method="POST" action="{{ route('create_perusahaan') }}">
            @csrf
            <div class="form-group">
                <label for="nama-perusahaan">Nama Perusahaan</label>
                <input type="text" id="nama-perusahaan" name="nama_perusahaan" class="form-control" placeholder="contoh: PT. XYZ" required>
            </div>
            <div class="form-group">
                <label for="alamat-perusahaan">Alamat Perusahaan</label>
                <input type="text" id="alamat-perusahaan" name="alamat" class="form-control">
            </div>
            <div class="form-group">
                <label for="email-perusahaan">Email Perusahaan</label>
                <input type="email" id="email-perusahaan" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="website-perusahaan">Website Perusahaan</label>
                <input type="text" id="website-perusahaan" name="website" class="form-control">
            </div>
            <div class="form-group">
                <label for="kontak-perusahaan">Telepon/Fax</label>
                <input type="text" id="kontak-perusahaan" name="kontak" class="form-control">
            </div>
        </form>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" form="create-form" value="Buat Perusahaan">
        </div>
    </div>
  </div>
</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
table td, table td * {
    vertical-align: top;
}

td:first-child {
    color: grey;
}
h5 {
    font-weight: 600;
}
</style>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#table-member').SetEditable({
            columnsEd: "1"
        });
        var table = $('#table-member').DataTable({
            paging      : false,
            searching   : true,
            scrollY     : 250,
            scrollCollapse    : true,
            info        : false,
        });
        
        $('#edit-perusahaan').click(function(){
            var temp_alamat = $('#alamat').html();
            var temp_pemilik = $('#pemilik').html();
            var temp_email = $('#email').html();
            var temp_web = $('#web').html();
            var temp_telp = $('#telp').html();

            $(this).hide();
            $('#save-perusahaan').show();
            $('#alamat').html('<textarea rows="2" cols="30" style="resize: none;">' + temp_alamat + '</textarea>');
            $('#pemilik').html('<input type="text" value="' + temp_pemilik + '">');
            $('#email').html('<input type="text" value="' + temp_email + '">');

            $('#web').removeAttr("target href");
            $('#web').html('<input type="text" value="' + temp_web + '">');
            $('#telp').html('<input type="text" value="' + temp_telp + '">');
        });

        $('#save-perusahaan').click(function(){
            $(this).hide();
            $('#edit-perusahaan').show();
            // console.log();
            $('#alamat').html($($('#alamat').children("textarea")[0]).html());
            $('#pemilik').html( $($('#pemilik').children("input")[0]).val());
            $('#email').html( $($('#email').children("input")[0]).val());
            $('#web').attr({
                href: "http://" + $($('#web').children("input")[0]).val(),
                target: "_blank"});
            $('#web').html( $($('#web').children("input")[0]).val());
            $('#telp').html( $($('#telp').children("input")[0]).val());
            
        });
    } );
</script>
<script src="{{ asset('js/bootstable-perusahaan.js') }}"></script>

@endsection