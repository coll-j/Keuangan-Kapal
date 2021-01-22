<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{

    protected $tabel = 'gudang';
    protected $fillable = [
        'nama_barang',
        'satuan',
        'jumlah',
        'harga_satuan',
    ];
}
