<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\Proyek;
use App\Models\Catatan\TransaksiProyek;
use App\Models\Catatan\Anggaran;
use App\Models\AkunTransaksiProyek;

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

    public function pageLabaRugiProyek($id_proyek = null, $date_range = null){
        // dd($id_proyek);
        $start_date = null;
        $end_date = null;
        if(!(is_null($date_range)) && $date_range != 'all')
        {
            $separated = explode(' - ', $date_range);
            $start_date = Carbon::CreateFromFormat('d-m-Y', $separated[0])->startOfDay();
            $end_date = Carbon::CreateFromFormat('d-m-Y', $separated[1])->endOfDay();

            $date_range = str_replace('-', '/', $date_range);
            $date_range = str_replace(' / ', ' - ', $date_range);
        }
        else $date_range = null;
        if(Auth::user()->role == 4)
        {
            $proyeks = Proyek::where('id_pemilik', Auth::user()->id)->get();
        }
        else
        {
            $proyeks = Proyek::where('id_perusahaan', Auth::user()->id_perusahaan)->get();
        }

        $curr_proyek = null;
        if(!(is_null($id_proyek)) && $id_proyek != 'all')
        {
            $curr_proyek = Proyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                                ->where('id', $id_proyek)
                                ->first();
        }

        $pendapatans = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                    ->where('jenis', 'Masuk')
                    ->get();
        $biayas = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis', 'Keluar')
                ->get();

        // dd($anggarans, $realisasis);
        return view('laporan/laba_rugi_proyek', compact('proyeks', 'curr_proyek', 
        'pendapatans', 'biayas', 'start_date', 'end_date', 'date_range'));
    }
}
