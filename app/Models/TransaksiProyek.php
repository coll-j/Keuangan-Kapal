<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi', 'nama_transaksi','jenis_simpanan','jumlah','dibayar_diterima','id_perusahaan',
    ];
}
