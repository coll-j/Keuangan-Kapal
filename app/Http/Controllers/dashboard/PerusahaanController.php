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
        // dd($request);
        for ($i = 0; $i < count($request->add_email); $i++)
        {
            $perusahaan = Perusahaan::where('id', '=', Auth::user()->id_perusahaan)->first();
            $token = Str::random(20);
            Invitation::create([
                'token' => $token,
                'email' => $request->add_email[$i],
                'id_perusahaan' => Auth::user()->id_perusahaan,
                'role' => $request->add_jabatan[$i],
                'status' => 0,
            ]);
            Mail::to($request->add_email[$i])->send(new PerusahaanInvitation($token, $perusahaan->nama_perusahaan));

        }

        return redirect()->route('profil_perusahaan');
    }

    public function acc_invite (Request $request){
        $invitation = Invitation::where('token', '=', $request->invite_token)->first();
        // dd($invitation);
        if(!(is_null($invitation))){
            $invitation->status = 1;
            $invitation->save();
        }

        $user = User::where('email', '=', $invitation->email)->first();
        if(!(is_null($user)))
        {
            $user->id_perusahaan = $invitation->id_perusahaan;
            $user->role = $invitation->role;
            $user->save();
        }

        return redirect()->route('profil_perusahaan');
    }

    public function rej_invite (Request $request){
        $invitation = Invitation::where('token', '=', $request->invite_token)->first();

        if(!(is_null($invitation))){
            $invitation->status = 2;
            $invitation->save();
        }

        return redirect()->route('profil_perusahaan');
    }

    public function edit_role(Request $request){
        // dd(true);
        $user = User::find($request->user_id);
        $user->role = $request->role;
        $user->save();

        return $request;
    }

    public function delete_member(Request $request){
        // dd(true);
        $user = User::find($request->user_id);
        $user->role = null;
        $user->id_perusahaan = null;
        $user->save();
        
        return $request;
    }
}
