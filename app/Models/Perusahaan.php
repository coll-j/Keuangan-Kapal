<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan', 
        'kode_perusahaan', 
        'alamat', 
        'email', 
        'website', 
        'telp',
    ];

}
