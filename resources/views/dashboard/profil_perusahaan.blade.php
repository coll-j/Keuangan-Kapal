@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Profil Perusahaan')

@section('content_header')
<h5 class="pl-3">PROFIL PERUSAHAAN</h5>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h1 class="text-center">PT. XYZ</h1>
                    <p class="text-muted text-center" style="font-size: 12px;">(Id: 0123456789)</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Alamat</b> 
                                <a class="col">Kampus ITS, Sukolilo, Jl. Raya ITS, Keputih, Surabaya, Jawa Timur 60117</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Pemilik</b> 
                                <a class="col">Dr. Angka</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Email</b> 
                                <a class="col">pt-xyz@its.ac.id</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Website</b> 
                                <a class="col">its.ac.id</a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <b class="col-md-3">Telepon/Fax</b> 
                                <a class="col">(0343) 123456</a>
                            </div>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
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
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lihat</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tambah</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <button class="btn btn-sm btn-primary float-right ml-1"><i class="fas fa-pencil-alt"></i></button>
                        <table id="table-member" class="display table table-stripped table-hover table-condensed table-sm dataTable">
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
                                    <td>Project Manager</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                                <tr>
                                    <td>Dr. Eng. Chastine Fatichah</td>
                                    <td>Direktur</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
        
                    <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
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
    <!-- /.row -->
</div>
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
        $('#table-member').DataTable({
            paging      : false,
            searching   : true,
            scrollY     : 320,
            scrollCollapse    : true,
            info        : false,
        });
    } );
</script>
@endsection