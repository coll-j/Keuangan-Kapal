<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';

    protected $fillable = [
        'nama_perusahaan',
        'pemilik',
        'alamat',
        'email',
        'website',
        'telp',
    ];

    protected $hidden = [
    ];

    public function user(){
        return $this->hasMany('\App\Models\User', 'id_perusahaan');
    }

    public function invitation(){
        return $this->hasMany('\App\Models\Invitation', 'id_perusahaan');
    }

    public function catatan_transaksi_proyek(){
        return $this->hasMany('\App\Models\Catatan\TransaksiProyek', 'id', 'id_perusahaan');
    }
}
