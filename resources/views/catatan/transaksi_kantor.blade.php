@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Kantor')

@section('content_header')
<h1>TRANSAKSI KANTOR</h1>
@endsection

@section('content')
<div class="col">
    <div class="row text-center">
        <div class="col">
            <h5>Catatan Transaksi Kantor</h5>
            <div class="col-xs-offset-9 col-xs-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Kas</th>
                            <th>5,550,000</th>
                        </tr>

                        <tr>
                            <th scope="col">Bank</th>
                            <th>507,280,000</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <button type="button" class="btn btn-outline-primary">Edit</button>
            <button type="button" class="btn btn-outline-primary">Save</button>
            <br><br>
        </div>
    </div>
    <table class="table table-hover">
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
                <td>1/2/2019</td>
                <td>Uang muka Sewa Kantor</td>
                <td>Untuk sewa kantor 2 tahun</td>
                <td>Bank</td>
                <td>Keluar</td>
                <td>120,000,000</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>1/2/2019</td>
                <td>Uang muka Sewa Kantor</td>
                <td>Untuk sewa kantor 2 tahun</td>
                <td>Bank</td>
                <td>Keluar</td>
                <td>120,000,000</td>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>1/2/2019</td>
                <td>Uang muka Sewa Kantor</td>
                <td>Untuk sewa kantor 2 tahun</td>
                <td>Bank</td>
                <td>Keluar</td>
                <td>120,000,000</td>
            </tr>
            <tr>
                <th scope="row">5</th>
                <td>1/2/2019</td>
                <td>Uang muka Sewa Kantor</td>
                <td>Untuk sewa kantor 2 tahun</td>
                <td>Bank</td>
                <td>Keluar</td>
                <td>120,000,000</td>
            </tr>
        </tbody>
    </table>

    @endsection

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @endsection

    @section('js')
    <script>
        console.log('Hi!');
    </script>
    @endsection