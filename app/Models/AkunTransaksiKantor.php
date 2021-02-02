<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunTransaksiKantor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jenis', 'id_perusahaan',
    ];
    
    public function catatan_transaksi_proyek(){
        return $this->hasMany('\App\Models\Catatan\TransaksiKantor', 'id', 'id_akun_tr_kantor');
    }

    public function anggaran(){
        return $this->hasMany('\App\Models\Catatan\Anggaran', 'id', 'id_akun_tr_kantor');
    }
}
