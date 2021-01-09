@extends('layouts.front')
@section('content')
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
    <div class="top-right links">
        <a class="text-info" href="{{ route('login') }}">Masuk</a>

        @if (Route::has('register'))
            <a class="text-info" href="{{ route('register') }}">Daftar</a>
        @endif
    </div>
    @endif

    <div class="content">
        <div class="card border-primary rounded">
            <div class="card-body bg-info">
                <div class="title text-light">
                    Aplikasi Manajemen Keuangan<br>
                    Industri Kapal Kayu
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

