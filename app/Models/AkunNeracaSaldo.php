<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunNeracaSaldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'saldo', 'id_perusahaan', 'jenis_akun', 'jenis_neraca',
    ];
    
    public function catatan_transaksi_proyek(){
        return $this->hasMany('\App\Models\Catatan\TransaksiProyek', 'id', 'id_akun_neraca');
    }
}
