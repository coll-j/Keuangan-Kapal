<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Catatan\TransaksiProyek;
use DateTime;

use App\Models\AkunTransaksiProyek;
use App\Models\Pemasok;
use App\Models\Proyek;
use App\Models\AkunNeracaSaldo;
use App\Models\Gudang;

class TransaksiProyekController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert (Request $request) {
        // dd(DateTime::CreateFromFormat('d/m/Y', $request->tanggal_transaksi));
        // create transaksi proyek
        TransaksiProyek::create([
            'tanggal_transaksi' => DateTime::CreateFromFormat('d/m/Y', $request->tanggal_transaksi),
            'id_akun_tr_proyek' => $request->jenis_transaksi,
            'id_pemasok' => $request->id_pemasok,
            'nama_material' => $request->nama_material,
            'jumlah_material' => $request->jumlah_material,
            'satuan_material' => $request->satuan_material,
            'id_proyek' => $request->id_proyek,
            'id_akun_neraca' => $request->akun_neraca,
            'jumlah' => floatval(str_replace(",","",$request->jumlah_transaksi)),
            'terbayar' => floatval(str_replace(",","",$request->jumlah_dibayar)),
            'id_perusahaan' => Auth::user()->id_perusahaan,
        ]);
        // create gudang
        if(!(empty($request->nama_material)) && !(empty($request->jumlah_material)))
        Gudang::create([
            'id_perusahaan' => Auth::user()->id_perusahaan,
            'nama_barang' => $request->nama_material,
            'satuan' => $request->satuan_material,
            'jumlah' => $request->jumlah_material,
            'jenis' => 'Masuk',
            'harga_satuan' => (floatval(str_replace(",","",$request->jumlah_transaksi))/$request->jumlah_material),
        ]);

        return redirect()->route('transaksi_proyek');
    }
}
