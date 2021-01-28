<?php

namespace App\Models\Catatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProyek extends Model
{
    use HasFactory;
    protected $table = 'catatan_transaksi_proyeks';

    protected $fillable = [
        'tanggal_transaksi',
        'id_akun_tr_proyek',
        'id_pemasok',
        'nama_material',
        'jumlah_material',
        'satuan_material',
        'id_proyek',
        'id_akun_neraca',
        'jumlah',
        'terbayar',
        'id_perusahaan',
    ];

    public function akun_tr_proyek(){
        return $this->belongsTo('\App\Models\AkunTransaksiProyek', 'id_akun_tr_proyek', 'id');
    }

    public function pemasok(){
        return $this->belongsTo('\App\Models\Pemasok', 'id_pemasok', 'id');
    }

    public function proyek(){
        return $this->belongsTo('\App\Models\Proyek', 'id_proyek', 'id');
    }

    public function akun_neraca(){
        return $this->belongsTo('\App\Models\AkunNeracaSaldo', 'id_akun_neraca', 'id');
    }

    public function perusahaan(){
        return $this->belongsTo('\App\Models\Perusahaan', 'id_perusahaan', 'id');
    }
}
