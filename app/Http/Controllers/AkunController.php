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
            'saldo' => floatval(str_replace(",","",$req->n_saldo)),
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
            'jenis_akun' => $req->jenis_akun,
            'jenis_neraca' => $req->jenis_neraca,

        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiProyek(Request $req) 
    {
        AkunTransaksiProyek::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
            'jenis_neraca' => $req->jenis_neraca,

        ]);
        return redirect()->route('data');
    }

    function addAkunTransaksiKantor(Request $req) 
    {
        AkunTransaksiKantor::create([
            'nama' => $req->at_nama,
            'jenis' => $req->at_jenis,
            'jenis_neraca' => $req->jenis_neraca,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addProyek(Request $req) 
    {
        Proyek::create([
            'id_pemilik' => $req->pr_kode,
            'jenis' => $req->pr_nama,
            'id_perusahaan' => (User::find(Auth::user()->id))->id_perusahaan,
        ]);
        return redirect()->route('data');
    }

    function addPemasok(Request $req) 
    {
        Pemasok::create([
            'nama' => $req->pe_kode,
            'jenis' => $req->pe_nama,
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

    function delPemasok($nama)
    {
        $data = Pemasok::where('nama', '=', $nama)->first();
        $data->delete();
        return redirect()->route('data');
    }

    function delProyek($nama)
    {
        $data = Proyek::where('nama', '=', $nama)->first();
        $data->delete();
        return redirect()->route('data');
    }
    
    function editAkunNeraca(Request $req)
    {
        $data = AkunNeracaSaldo::where('id', '=', $req->id)->first();
        $data->nama = $req->nama;
        $data->saldo = $req->var2; 
        $data->save();
        return redirect()->route('data');
    }

    function editAkunTransaksiProyek(Request $req)
    {
        $data = AkunTransaksiProyek::where('id', '=', $req->id)->first();
        $data->nama = $req->nama;
        $data->jenis = $req->var2; 
        $data->save();
        return redirect()->route('data');
    }

    function editAkunTransaksiKantor(Request $req)
    {
        $data = AkunTransaksiKantor::where('id', '=', $req->id)->first();
        $data->nama = $req->nama;
        $data->jenis = $req->var2; 
        $data->save();
        return redirect()->route('data');
    }

    function editPemasok(Request $req)
    {
        $data = Pemasok::where('id', '=', $req->id)->first();
        $data->nama = $req->nama;
        $data->jenis = $req->var2; 
        $data->save();
        return redirect()->route('data');
    }

    function editProyek(Request $req)
    {
        $data = Proyek::where('id', '=', $req->id)->first();
        $data->nama = $req->nama;
        $data->jenis = $req->var2; 
        $data->save();
        return redirect()->route('data');
    }
}
