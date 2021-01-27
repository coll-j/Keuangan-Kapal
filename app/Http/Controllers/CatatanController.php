<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('catatan/transaksi_proyek');
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
        return view('catatan/gudang');
    }

}
