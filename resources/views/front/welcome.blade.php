@extends('adminlte::front')

@section('content')
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
    <div class="top-right links">
        <a class="text-primary" href="{{ route('login') }}">Masuk</a>

        @if (Route::has('register'))
            <a class="text-primary" href="{{ route('register') }}">Daftar</a>
        @endif
    </div>
    @endif

    <div class="content">
        <div class="card border-info rounded p-3">
            <div class="card-body bg-primary p-5">
                <div class="title text-light">
                    Aplikasi Manajemen Keuangan<br>
                    Industri Kapal Kayu
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script>
    console.log('Hi!'); 
</script>
@endsection
