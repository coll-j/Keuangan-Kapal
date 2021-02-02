<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriAsetLancar extends Model
{
    use HasFactory;

    protected $tabel = 'histori_aset_lancars';
    protected $guarded = [];

    protected $fillable = [
        'id_perusahaan',
        'tgl_transaksi',
        'id_akun_neraca',
        'sisa_saldo',
        'id_transaksi',
    ];
}
