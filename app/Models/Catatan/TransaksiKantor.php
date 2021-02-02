<?php

namespace App\Models\Catatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKantor extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl_transaksi', 'id_akun_tr_kantor','keterangan','id_akun_neraca', 'jumlah','id_perusahaan',
    ];

    protected $table = 'catatan_transaksi_kantors';

    public function akun_tr_kantor(){
        return $this->belongsTo('\App\Models\AkunTransaksiKantor', 'id_akun_tr_kantor', 'id');
    }

    public function akun_neraca(){
        return $this->belongsTo('\App\Models\AkunNeracaSaldo', 'id_akun_neraca', 'id');
    }

    public function perusahaan(){
        return $this->belongsTo('\App\Models\Perusahaan', 'id_perusahaan', 'id');
    }
}
