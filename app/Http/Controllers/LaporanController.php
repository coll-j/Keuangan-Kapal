<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
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
    public function pageLabaRugi(){
        return view('laporan/laba_rugi');
    }

    public function pageLabaRugiKantor(){
        return view('laporan/laba_rugi_kantor');
    }

    public function pageLabaRugiProyek(){
        return view('laporan/laba_rugi_proyek');
    }
}
