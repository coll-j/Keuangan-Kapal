@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Profil Perusahaan')

@section('css')
<style>
    .fa-check-circle:hover {
        color: #007E33;
    }

    .fa-times-circle:hover {
        color: #CC0000;
    }
</style>
<meta name="csrf-token" content="{{ Session::token() }}"> 
@endsection

@section('content_header')
<h5 class="pl-3">PROFIL PERUSAHAAN</h5>
@endsection

@section('content')
<div class="container h-100">
    @if(!empty(Auth::user()->id_perusahaan) && !(is_null($perusahaan)))
    <div id="detail-perusahaan" class="row" >
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h1 class="text-center pb-3">{{ $perusahaan->nama_perusahaan }}</h1>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Alamat</b> 
                                <a id="alamat" class="col">{{ $perusahaan->alamat }}</a>
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
                        <li class="nav-item"><a class="nav-link" href="#terkirim" data-toggle="tab">Undangan Terkirim</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- <button class="btn btn-sm btn-primary float-left ml-1"><i class="fas fa-pencil-alt"></i></button> -->
                        <table id="table-member" class="display table table-hover table-condensed table-sm">
                            <thead class="thead-light">
                                <th class="d-none"></th>
                                <th style="width: 60%">Nama</th>
                                <th style="width: 40%">Jabatan</th>
                            </thead>
                            <tbody>
                                @foreach($perusahaan->user as $anggota)
                                <tr>
                                    <td class="d-none">{{ $anggota->id }}</td>
                                    <td>{{ $anggota->name }}</td>
                                    @switch($anggota->role)
                                        @case(1)
                                            <td>Administrator</td>
                                            @break
                                        @case(2)
                                            <td>Akuntan</td>
                                            @break
                                        @case(3)
                                            <td>Pemilik Perusahaan</td>
                                            @break
                                        @case(4)
                                            <td>Pemilik Proyek</td>
                                            @break
                                        @default
                                            <td>Super Admin</td>
                                            @break
                                    @endswitch
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" method="POST" action="{{ route('invite_anggota') }}">
                            @csrf
                            <table id="table-undang" class="display table table-sm table-condensed">
                                <thead class="bg-light">
                                    <tr>
                                        <td>E-mail</td>
                                        <td>Jabatan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="email" class="form-control" name="add_email[]" placeholder="Masukkan e-mail untuk diundang"></td>
                                        <td>
                                            <select class="form-control" name="add_jabatan[]">
                                                <option>Pemilik</option>
                                                <option>Pemilik Proyek</option>
                                                <option>Administrator</option>
                                                <option>Akuntan</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-sm btn-success float-right">Submit</button>
                                <button id="add-anggota" type="button" class="btn btn-sm btn-outline-success float-right mx-1"><i class="fas fa-plus"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="terkirim">
                        <table id="table-invite" class="display table table-hover table-condensed table-sm">
                            <thead class="thead-light">
                                <th style="width: 60%">Email</th>
                                <th style="width: 20%">Jabatan</th>
                                <th style="width: 20%">Status</th>
                            </thead>
                            <tbody>
                                @if(!(is_null($invitations)))
                                    @foreach($invitations as $invitation)
                                    <tr>
                                        <td>{{ $invitation->email }}</td>
                                        @switch($invitation->role)
                                            @case(1)
                                                <td>Administrator</td>
                                                @break
                                            @case(2)
                                                <td>Akuntan</td>
                                                @break
                                            @case(3)
                                                <td>Pemilik</td>
                                                @break
                                            @case(4)
                                                <td>Pemilik Proyek</td>
                                                @break
                                            @default
                                                <td>Super Admin</td>
                                                @break
                                        @endswitch
                                        @switch($invitation->status)
                                            @case(1)
                                                <td><span class="p-1 text-sm bg-success text-white rounded">Diterima</span></td>
                                                @break
                                            @case(2)
                                                <td><span class="p-1 text-sm bg-danger text-white rounded">Ditolak</span></td>
                                                @break
                                            @default
                                                <td><span class="p-1 text-sm bg-light text-dark rounded">Pending</span></td>
                                                @break
                                        @endswitch
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
    @elseif(!(is_null($invite)))
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5>Undangan</h5>
                </div>
                <div class="card-body row">
                    <div class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-3">Perusahaan</dt>
                            <dd class="col-sm-9">{{ $invite->perusahaan->first()->nama_perusahaan }}</dd>
                            <dt class="col-sm-3">Posisi</dt>
                            @switch($invite->role)
                                @case(1)
                                    <dd class="col-sm-9">Administrator</dd>
                                    @break
                                @case(2)
                                    <dd class="col-sm-9">Akuntan</dd>
                                    @break
                                @case(3)
                                    <dd class="col-sm-9">Pemilik</dd>
                                    @break
                                @case(4)
                                    <dd class="col-sm-9">Pemilik Proyek</dd>
                                    @break
                                @default
                                    <dd class="col-sm-9">Super Admin</dd>
                                    @break
                            @endswitch
                        </dl>
                    </div>
                    <div class="col">
                        <button class="btn btn-lg text-danger float-right" form="rej-invite"><i class="far fa-2x fa-times-circle shadow-sm rounded-circle"></i></button>
                        <button class="btn btn-lg text-success float-right" form="acc-invite"><i class="far fa-2x fa-check-circle shadow-sm rounded-circle"></i></button>
                    </div>
                    <form id="acc-invite" class="d-none" method="POST" action="{{ route('acc_invite') }}">
                        @csrf
                        <input type="text" name="invite_token" value="{{ $invite->token }}">
                    </form>
                    <form id="rej-invite" class="d-none" method="POST" action="{{ route('rej_invite') }}">
                        @csrf
                        <input type="text" name="invite_token" value="{{ $invite->token }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
    <div id="no-perusahaan" class="row">
        <div class="col text-center">
                <h2 class="my-5">Anda belum tergabung perusahaan dan belum ada undangan</h2>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">Buat Perusahaan</button>
        </div>
    </div>
    @endif
    <!-- /.row -->
</div>

@if(empty(Auth::user()->id_perusahaan))

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
            columnsEd: "2",
            onEdit: function(selected_val, user_id){
                console.log('cobs', selected_val, user_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/edit_role',
                    method: 'post',
                    data: {
                        role: selected_val,
                        user_id: user_id,
                    },
                    success:function(data){
                        console.log(data);          
                    }
                });
            },
            onDelete: function(user_id){
                console.log('delete ', user_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/delete_member',
                    method: 'post',
                    data: {
                        user_id: user_id,
                    },
                    success:function(data){
                        console.log(data);          
                    }
                });
            },
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
            $('#email').html('<input type="email" size="30" value="' + temp_email + '">');

            $('#web').removeAttr("target href");
            $('#web').html('<input type="text" size="30" value="' + temp_web + '">');
            $('#telp').html('<input type="text" size="30" value="' + temp_telp + '">');
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

        $('#add-anggota').click(function(){
            $('#table-undang tr:last').after('<tr> \
            <td><input type="email" class="form-control" name="add_email[]" placeholder="Masukkan e-mail untuk diundang"></td> \
            <td> \
                <select class="form-control" name="add_jabatan[]"> \
                    <option>Pemilik</option> \
                    <option>Pemilik Proyek</option> \
                    <option>Administrator</option> \
                    <option>Akuntan</option> \
                </select> \
            </td> \
        </tr>');
        });
    } );
</script>
<script src="{{ asset('js/bootstable-perusahaan.js') }}"></script>

@endsection