<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AkunTransaksiKantor;
use App\Models\AkunTransaksiProyek;
use App\Models\AkunNeracaSaldo;
use App\Models\Pemasok;
use App\Models\Perusahaan;
use App\Models\Proyek;
use App\Models\Invitation;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pageProfilPerusahaan(){
        // $perusahaan = Perusahaan::with('user')->get();
        $perusahaan = Perusahaan::with('user')->get()->where('id', '=', Auth::user()->id_perusahaan)->first();
        $invite = Invitation::with('perusahaan')->get()
                ->where('email', '=', Auth::user()->email)
                ->where('status', '=', 0)
                ->first();
        $invitations = null;
        if(!(is_null(Auth::user()->id_perusahaan)))
        {
            $invitations = Invitation::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
            // dd(Invitation::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get());
        }
        return view('dashboard/profil_perusahaan', compact('perusahaan', 'invite', 'invitations'));
    }

    public function pageData(){
        $akun_transaksi_kantors = AkunTransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $akun_transaksi_proyeks = AkunTransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $akun_neraca_saldos = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $pemasoks = Pemasok::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $proyeks = Proyek::with('user')->where('id_perusahaan', '=', 1)->get();
        $man_proyek = User::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->where('role', '=', 4)->get();
        // dd($proyeks->first()->user->name);
        return view('dashboard/data', [
            'akun_transaksi_kantors' => $akun_transaksi_kantors, 
            'akun_transaksi_proyeks' => $akun_transaksi_proyeks,
            'akun_neraca_saldos' => $akun_neraca_saldos,
            'pemasoks' => $pemasoks,
            'proyeks' => $proyeks,
            'man_proyek' => $man_proyek,
            ]);
    }  

    
}
