<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AkunNeracaSaldo;
use App\Models\AkunTransaksiProyek;
use App\Models\AkunTransaksiKantor;
use App\Models\Pemasok;
use App\Models\Proyek;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addAkunNeraca(Request $req) 
    {
        AkunNeracaSaldo::create([
            'nama' => $req->n_nama,
            'saldo' => $req->n_saldo,
        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiProyek(Request $req) 
    {
        AkunTransaksiProyek::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiKantor(Request $req) 
    {
        AkunTransaksiKantor::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
        ]);
        return redirect()->route('data');
    }

    function addProyek(Request $req) 
    {
        Proyek::create([
            'kode' => $req->pr_kode,
            'nama' => $req->pr_nama,
        ]);
        return redirect()->route('data');
    }

    function addPemasok(Request $req) 
    {
        Pemasok::create([
            'kode' => $req->pe_kode,
            'nama' => $req->pe_nama,
        ]);
        return redirect()->route('data');
    }
}
