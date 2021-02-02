<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Catatan\TransaksiKantor;
use DateTime;

use App\Models\AkunTransaksiKantor;
use App\Models\AkunNeracaSaldo;

class TransaksiKantorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert (Request $request) {
        // dd(DateTime::CreateFromFormat('d/m/Y', $request->tanggal_transaksi));
        // create transaksi kantor
        $akun = AkunTransaksiKantor::find($request->jenis_transaksi);
        $jml = floatval(str_replace(",","",$request->jumlah_transaksi));

        $tr_kantor = TransaksiKantor::create([
            'tgl_transaksi' => DateTime::CreateFromFormat('d/m/Y', $request->tgl_transaksi),
            'id_akun_tr_kantor' => $request->jenis_transaksi,
            'keterangan' => $request->keterangan,
            'id_akun_neraca' => $request->akun_neraca,
            'jumlah' => $jml,
            'id_perusahaan' => Auth::user()->id_perusahaan,
        ]);

        return redirect()->route('transaksi_kantor');
    }

    public function getById ($id) {
        // dd($id);
        return json_encode(TransaksiKantor::find($id));
    }

    public function edit (Request $request) {
        // dd($request);
        $tr_kantor = TransaksiKantor::find($request->id);
        $akun = AkunTransaksiKantor::find($request->jenis_transaksi);
        $jml = floatval(str_replace(",","",$request->jumlah_transaksi));

        $tr_kantor->tgl_transaksi = DateTime::CreateFromFormat('Y-m-d', $request->tgl_transaksi);
        $tr_kantor->id_akun_tr_kantor = $request->jenis_transaksi;
        $tr_kantor->keterangan = $request->keterangan;
        $tr_kantor->id_akun_neraca = $request->akun_neraca;
        $tr_kantor->jumlah = $jml;

        $tr_kantor->save();

        return redirect()->route('transaksi_kantor');
    }

    public function delete (Request $request) {
        // dd($request);
        try {
            TransaksiKantor::find($request->id)->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
        return $request->id;
    }
}