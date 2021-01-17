@extends('adminlte::page')

@section('title', 'Keuangan Kapal | Transaksi Proyek')

@section('content_header')
<h5 class="pl-3"><b>TRANSAKSI PROYEK</b></h5>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center pt-3 mb-3">
            <div class="col">
                <h5>Catatan Transaksi Proyek</h5>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input name="daterange" value="01/01/2018" type="text" style="width: 180px;" class="form-control text-center">
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="row justify-content-start">
                    <button type="button" class="btn btn-primary mr-2"><i class="fas fa-pencil-alt"></i> Edit</button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>
            <div class="col-sm">
                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Kas </b>
                    </div>
                    <div class=" col-3 text-right">
                        5,550,000
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-2 text-left">
                        <b> Bank </b>
                    </div>
                    <div class="col-3 text-right">
                        507,280,000
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body " style="max-width: 1200px;">
        <div class="dataTables_wrapper">
            <table id="table-transaksi-proyek" class="display table table-stripped table-hover table-condensed table-sm dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th width="20%">Transaksi</th>
                        <th scope="col">Kode Pemasok</th>
                        <th scope="col">Pemasok</th>
                        <th scope="col">Kode Proyek</th>
                        <th scope="col">Proyek</th>
                        <th scope="col">Kas/Bank</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Dibayar/Diterima</th>
                        <th scope="col">Sisa</th>
                        <th scope="col">Utang/Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>A</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>A</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>A</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>A</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>1/2/2019</td>
                        <td>Biaya Persiapan dan Perijinan</td>
                        <td>A</td>
                        <td>Pemasok</td>
                        <td>1</td>
                        <td>Pak David</td>
                        <td>Bank</td>
                        <td>Keluar</td>
                        <td>12,500,000</td>
                        <td>12,500,000</td>
                        <td>0</td>
                        <td>Utang</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
    </div>
    <!-- /.card-footer -->
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table-transaksi-proyek').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': false,
            'autoWidth': false,
            'scrollX': true,
        });
    });
</script>
<script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10)
        });
    });
</script>
@endsection