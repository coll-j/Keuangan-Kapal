<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image()
    {
        return 'https://cdn.idntimes.com/content-images/community/2020/09/20200915-220626-958d3c98578738c0e239152d117462b2.jpg';
    }
    
    public function adminlte_desc()
    {
        return 'Direktur Utama';
    }
    
    public function adminlte_profile_url()
    {
        return 'profile/';
    }

    public function perusahaan(){
        return $this->belongsTo('\App\Models\Perusahaan');
    }
}
