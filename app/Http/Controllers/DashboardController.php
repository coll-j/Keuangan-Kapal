<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;

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
        return view('dashboard/data');
    }  

    
}
