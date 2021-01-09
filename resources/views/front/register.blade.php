@extends('adminlte::front')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="card text-center rounded">
            <div class="card-header bg-info text-light">
            Daftar
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.index') }}">
                    <div class="form-group">
                        <label class="float-left" for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label class="float-left" for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label class="float-left" for="phone">Nomor Telepon</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label class="float-left" for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="float-left" for="conf-password">Konfirmasi Kata Sandi</label>
                        <input type="password" class="form-control" id="conf-password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Daftar</button>
                </form>
            </div>
            <div class="card-footer text-left">
                <span>Sudah punya akun? </span> <a href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
</div>
@endsection