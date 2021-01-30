<?php

namespace App\Models\Catatan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;
    protected $table = 'anggaran_proyek';

    protected $fillable = [
        'id_akun_tr_proyek',
        'id_perusahaan',
        'id_proyek',
        'nominal',
    ];

    public function akun_tr_proyek(){
        return $this->belongsTo('\App\Models\AkunTransaksiProyek', 'id_akun_tr_proyek', 'id');
    }
}
