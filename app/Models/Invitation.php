<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitation';

    protected $fillable = [
        'token',
        'email',
        'id_perusahaan',
        'role',
    ];

    protected $hidden = [
        'token',
        'id_perusahaan'
    ];

    public function perusahaan(){
        return $this->belongsTo('\App\Models\Perusahaan', 'id_perusahaan', 'id');
    }
}
