<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invitation;
use App\Mail\PerusahaanInvitation;

use Mail;

class PerusahaanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert (Request $request) {
        $perusahaan = Perusahaan::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'pemilik' => Auth::user()->id,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,
            'telp' => $request->kontak,
        ]);

        $user = User::find(Auth::user()->id);
        $user->id_perusahaan = $perusahaan->id;
        $user->role = 1; // admin
        $user->save();
        return redirect()->route('profil_perusahaan');
    }

    public function invite (Request $request){
        // $email = 'zumazaki@gmail.com';
        $token = Str::random(20);
        Invitation::create([
            'token' => $token,
            'email' => 'boots.anak.monyet@gelandangan.com',
        ]);
        Mail::to('zumazaki@gmail.com')->send(new PerusahaanInvitation($token));

        return redirect()->route('profil_perusahaan');
    }
}
