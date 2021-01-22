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
        $perusahaan = Perusahaan::with('user')->get()->where('kode_perusahaan', '=', Auth::user()->kode_perusahaan)->first();
        // dd($perusahaan->user->first());
        return view('dashboard/profil_perusahaan', compact('perusahaan'));
    }

    public function pageData(){
        $akun_transaksi_kantors = AkunTransaksiKantor::all();
        $akun_transaksi_proyeks = AkunTransaksiProyek::all();
        $akun_neraca_saldos = AkunNeracaSaldo::all();
        $pemasoks = Pemasok::all();
        $proyeks = Proyek::all();
        return view('dashboard/data', [
            'akun_transaksi_kantors' => $akun_transaksi_kantors, 
            'akun_transaksi_proyeks' => $akun_transaksi_proyeks,
            'akun_neraca_saldos' => $akun_neraca_saldos,
            'pemasoks' => $pemasoks,
            'proyeks' => $proyeks,
            ]);
    }  

    
}
