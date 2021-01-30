<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{

    protected $tabel = 'gudangs';
    protected $guarded = [];

    protected $fillable = [
        'id_perusahaan',
        'nama_barang',
        'id_parent',
        'id_transaksi',
        'satuan',
        'jumlah',
        'jenis',
        'harga_satuan',
    ];
}
