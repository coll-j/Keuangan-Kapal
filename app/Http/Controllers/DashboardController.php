<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('dashboard/profil_perusahaan');
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
