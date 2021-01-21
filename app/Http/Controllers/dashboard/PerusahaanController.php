<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PerusahaanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert (Request $request) {
        $kode = Str::random(10);
        Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'pemilik' => Auth::user()->id,
            'kode_perusahaan' => $kode,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,
            'telp' => $request->kontak,
        ]);
        
        $user = User::find(Auth::user()->id);
        $user->kode_perusahaan = $kode;
        $user->save();
        return redirect()->route('profil_perusahaan');
    }
}
