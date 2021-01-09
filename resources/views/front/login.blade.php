@extends('adminlte::front')
@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="card text-center rounded">
            <div class="card-header bg-info text-light">
            Masuk
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.index') }}">
                    <div class="form-group">
                        <label class="float-left" for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label class="float-left" for="password">Kata Sandi</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Masuk</button>
                </form>
            </div>
            <div class="card-footer text-left">
                <span>Lupa kata sandi? </span> <a href="#">Atur</a>
                <br>
                <span>Belum punya akun? </span> <a href="{{ route('register') }}">Daftar</a>
            </div>
        </div>
    </div>
</div>
@endsection