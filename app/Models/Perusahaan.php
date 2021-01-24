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
        'id_perusahaan',
        'pemilik',
        'alamat',
        'email',
        'website',
        'telp',
    ];

    protected $hidden = [
        'id_perusahaan',
    ];

    public function user(){
        return $this->hasMany('\App\Models\User', 'id_perusahaan');
    }

    public function invitation(){
        return $this->hasMany('\App\Models\Invitation', 'id_perusahaan');
    }
}
