<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKantor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi', 'nama_transaksi','keterangan','jenis_simpanan','jenis_transaksi','jumlah','id_perusahaan',
    ];

}
