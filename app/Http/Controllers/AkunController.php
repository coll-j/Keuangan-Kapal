<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiProyek(Request $req) 
    {
        AkunTransaksiProyek::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiKantor(Request $req) 
    {
        AkunTransaksiKantor::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addProyek(Request $req) 
    {
        Proyek::create([
            'kode' => $req->pr_kode,
            'nama' => $req->pr_nama,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addPemasok(Request $req) 
    {
        Pemasok::create([
            'kode' => $req->pe_kode,
            'nama' => $req->pe_nama,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function delAkunNeraca($nama)
    {
        $data = AkunNeracaSaldo::where('nama', '=', $nama)->first();
        $data->delete();
        return redirect()->route('data');
    }

    function delAkunTransaksiKantor($nama)
    {
        $data = AkunTransaksiKantor::where('nama', '=', $nama)->first();
        $data->delete();
        return redirect()->route('data');
    }

    function delAkunTransaksiProyek($nama)
    {
        $data = AkunTransaksiProyek::where('nama', '=', $nama)->first();
        $data->delete();
        return redirect()->route('data');
    }

    function delPemasok($kode)
    {
        $data = Pemasok::where('kode', '=', $kode)->first();
        $data->delete();
        return redirect()->route('data');
    }

    function delProyek($kode)
    {
        $data = Proyek::where('kode', '=', $kode)->first();
        $data->delete();
        return redirect()->route('data');
    }
    
}
