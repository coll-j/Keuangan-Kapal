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
    ];

    protected $hidden = [
        'token',
    ];
}
