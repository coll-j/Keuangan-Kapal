<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AkunTransaksiProyek;
use App\Models\Pemasok;
use App\Models\Proyek;
use App\Models\AkunNeracaSaldo;
use App\Models\Gudang;

use App\Models\Catatan\TransaksiProyek;
use App\Models\TransaksiKantor;
use App\Models\AkunTransaksiKantor;

class CatatanController extends Controller
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
    public function pageNeraca(){
        return view('catatan/neraca');
    }

    public function pageAnggaran(){
        return view('catatan/anggaran');
    }

    public function pageTransaksiProyek(){
        // get akun transaksi proyek
        $catatan_tr_proyeks = TransaksiProyek::with('akun_tr_proyek', 'pemasok', 'proyek', 'akun_neraca')->get();
                         //   ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $akun_tr_proyeks = AkunTransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        // get pemasok
        $pemasoks = Pemasok::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();

        // get proyek
        $proyeks = Proyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();

        // get akun neraca
        $akun_neracas = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        // dd($catatan_tr_proyeks->first()->pemasok);
        return view('catatan/transaksi_proyek', [
            'catatan_tr_proyeks' => $catatan_tr_proyeks,
            'akun_tr_proyeks' => $akun_tr_proyeks,
            'akun_neracas' => $akun_neracas,
            'pemasoks' => $pemasoks,
            'proyeks' => $proyeks,
            ]);
    }
    
    public function pageTransaksiKantor(){
        $transaksi_kantors = TransaksiKantor::all();
        $akun_transaksi_kantors = AkunTransaksiKantor::all();
        return view('catatan/transaksi_kantor', [
            'transaksi_kantors' => $transaksi_kantors, 
            'akun_transaksi_kantors' => $akun_transaksi_kantors, 
            ]);
    }

    public function pageHutangPiutang(){
        return view('catatan/hutang_piutang');
    }

    public function pageGudang(){
        $inventoris = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        dd($inventoris);
        return view('catatan/gudang', ['inventoris' => $inventoris]);
    }

}
