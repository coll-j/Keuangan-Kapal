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
        'kode_perusahaan',
        'alamat',
        'email',
        'website',
        'telp',
    ];

    protected $hidden = [
        'kode_perusahaan',
    ];

    public function user(){
        return $this->hasMany('\App\Models\User', 'kode_perusahaan', 'kode_perusahaan');
    }
}
