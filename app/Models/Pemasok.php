<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jenis','id_perusahaan',
    ];
    
    public function catatan_transaksi_proyek(){
        return $this->hasMany('\App\Models\Catatan\TransaksiProyek', 'id', 'id_pemasok');
    }
}
