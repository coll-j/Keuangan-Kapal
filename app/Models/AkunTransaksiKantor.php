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
    
}
