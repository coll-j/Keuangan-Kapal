@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Hutang Piutang')

@section('content_header')
<h1>HUTANG PIUTANG</h1>
@endsection

@section('content')
<div class="row text-left pt-3">
    <div class="col">
        <h5><b>RINGKASAN PIUTANG</b></h5>
    </div>
</div>
<div class="row">
    <div class="column">
        <table>
            <tr>
                <th>Kode</th>
                <th>Konsumen</th>
                <th>Piutang</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Pak David</td>
                <td>50,000,000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ibu Ivana</td>
                <td>300,000,000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pak Poltak</td>
                <td>100,000,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>450,000,000</td>
            </tr>
        </table>
    </div>
    <div class="column">
        <div class="row text-left pt-3">
            <div class="col">
                <h5><b>RINCIAN PIUTANG</b></h5>
            </div>
        </div>
        <table>
            <tr>
                <th>Kode</th>
                <th>Konsumen</th>
                <th>Transaksi</th>
                <th>Diterima</th>
                <th>Piutang</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Pak David</td>
                <td>1,350,000,000</td>
                <td>1,300,000,000</td>
                <td>50,000,000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ibu Ivana</td>
                <td>1,700,000,000</td>
                <td>1,400,000,000</td>
                <td>300,000,000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pak Poltak</td>
                <td>1,350,000,000</td>
                <td>1,300,000,000</td>
                <td>50,000,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>3,900,000,000</td>
                <td>3,450,000,000</td>
                <td>450,000,000</td>
            </tr>
        </table>
    </div>
</div>

<div class="row text-left pt-3">
    <div class="col">
        <h5><b>RINGKASAN UTANG</b></h5>
    </div>
</div>
<div class="row">
    <div class="column">
        <table>
            <tr>
                <th>Kode</th>
                <th>Konsumen</th>
                <th>Piutang</th>
            </tr>
            <tr>
                <td>A</td>
                <td>TB Gunung Mas</td>
                <td>149,750,000</td>
            </tr>
            <tr>
                <td>B</td>
                <td>Rumah Plus</td>
                <td>44,250,000</td>
            </tr>
            <tr>
                <td>C</td>
                <td>Sinar Logam</td>
                <td>75,000,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>269,000,000</td>
            </tr>
        </table>
    </div>

    <div class="column">
        <div class="row text-left pt-3">
            <div class="col">
                <h5><b>RINCIAN UTANG</b></h5>
            </div>
        </div>
        <table>
            <tr>
                <th>Kode</th>
                <th>Pemasok</th>
                <th>Transaksi</th>
                <th>Dibayar</th>
                <th>Utang</th>
            </tr>
            <tr>
                <td>A</td>
                <td>TB Gunung Mas</td>
                <td>1,314,750,000</td>
                <td>1,165,000,000</td>
                <td>149,750,000</td>
            </tr>
            <tr>
                <td>B</td>
                <td>Rumah Plus</td>
                <td>369,250,000</td>
                <td>325,000,000</td>
                <td>44,250,000</td>
            </tr>
            <tr>
                <td>C</td>
                <td>Sinar Logam</td>
                <td>575,000,000</td>
                <td>500,000,000</td>
                <td>75,000,000</td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah</td>
                <td>3,900,000,000</td>
                <td>3,450,000,000</td>
                <td>450,000,000</td>
            </tr>
        </table>
    </div>
</div>



@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    * {
        box-sizing: border-box;
    }

    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .column {
        float: left;
        width: 50%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 16px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other on screens that are smaller than 600 px */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
        }
    }
</style>
@endsection

@section('js')
<script>
    console.log('Hi!');
</script>
@endsection