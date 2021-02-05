<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gudang;
use Illuminate\Support\Facades\Auth;
use App\Models\Catatan\TransaksiProyek;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\AkunTransaksiProyek;
use App\Models\Pemasok;
use App\Models\Proyek;
use App\Models\AkunNeracaSaldo;
use App\Models\HistoriAsetLancar;
use Carbon\Carbon;

class TransaksiProyekController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert (Request $request) {
        // create transaksi proyek
        // $date_range = null;
        // $separated = explode(' - ', $date_range);
        // $start = Carbon::CreateFromFormat('d-m-Y', $separated[0])->startOfDay();
        // $end = Carbon::CreateFromFormat('d-m-Y', $separated[1])->endOfDay();

        // $sisa_material = Gudang::select('select sisa')
        //               ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
        //               ->whereBetween('catatan_transaksi_proyeks.tanggal_transaksi', [$start, $end])
        //               ->get();

        // bikin sisa dari transaksi proyek
        $akun = AkunTransaksiProyek::find($request->jenis_transaksi);
        $jml = floatval(str_replace(",", "", $request->jumlah_transaksi));
        $terbayar = floatval(str_replace(",", "", $request->jumlah_dibayar));

        $sisa = $jml - $terbayar;
        $jenis = '-';
        if ($sisa > 0 && $akun->jenis == 'Keluar') $jenis = 'Utang';
        else if ($sisa > 0 && $akun->jenis == 'Masuk') $jenis = 'Piutang';
        $kas_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->where('jenis_akun', '=', 'Kas')
            ->sum('saldo');

        $bank_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->where('jenis_akun', '=', 'Bank')
            ->sum('saldo');
        $akun = AkunNeracaSaldo::find($request->akun_neraca);
        $sisa_saldo = 0;
        // if($akun->jenis_neraca == 'Aset Lancar'){
        //     if($akun->jenis_akun == 'Kas') $sisa_saldo = $kas_sum - $jml;
        //     else if($akun->jenis_akun == 'Bank') $sisa_saldo = $kas_sum - $jml;
        //     $histori_aset_lancar = HistoriAsetLancar::create([
        //         'tgl_transaksi'=> DateTime::CreateFromFormat('d/m/Y', $request->tanggal_transaksi),
        //         'id_akun_neraca'=>$request->akun_neraca,
        //         'sisa_saldo'=>$sisa_saldo,
        //         'id_perusahaan' => Auth::user()->id_perusahaan,
        //     ]);
        // }
        $tr_proyek = TransaksiProyek::create([
            'tanggal_transaksi' => DateTime::CreateFromFormat('d/m/Y', $request->tanggal_transaksi),
            'id_akun_tr_proyek' => $request->jenis_transaksi,
            'id_pemasok' => $request->id_pemasok,
            'nama_material' => $request->nama_material,
            'jumlah_material' => $request->jumlah_material,
            'satuan_material' => $request->satuan_material,
            'id_proyek' => $request->id_proyek,
            'id_akun_neraca' => $request->akun_neraca,
            'jumlah' => $jml,
            'terbayar' => $terbayar,
            'sisa' => $sisa,
            'jenis' => $jenis,
            'id_perusahaan' => Auth::user()->id_perusahaan,
        ]);

        $materials = DB::table('gudangs')
            ->select('sisa')
            ->where('id_proyek', '=', $request->id_proyek)
            ->where('nama_barang', '=', $request->nama_material)
            ->orderByDesc('id')
            ->limit(1)
            ->get();
        // create gudang
        //
        $sisa = 0;
        foreach ($materials as $row) {
            $sisa = $row->sisa;
        }

        // dd($sisa);
        if (!(empty($request->nama_material)) && !(empty($request->jumlah_material))) {
            Gudang::create([
                'id_perusahaan' => Auth::user()->id_perusahaan,
                'id_transaksi' => $tr_proyek->id,
                'id_proyek' => $request->id_proyek,
                'nama_barang' => $request->nama_material,
                'satuan' => $request->satuan_material,
                'jumlah' => $request->jumlah_material,
                'jenis' => 'Masuk',
                //  'harga_satuan' => (floatval(str_replace(",","",$request->jumlah_transaksi))/$request->jumlah_material),
                'sisa' => intval($request->jumlah_material) + intval($sisa),
                'keterangan' => '-'
            ]);
        }

        return redirect()->route('transaksi_proyek');
    }

    public function getById($id)
    {
        // dd($id);
        return json_encode(TransaksiProyek::find($id));
    }

    public function edit(Request $request)
    {
        // dd($request);
        $tr_proyek = TransaksiProyek::find($request->id);
        $akun = AkunTransaksiProyek::find($request->jenis_transaksi);
        $jml = floatval(str_replace(",", "", $request->jumlah_transaksi));
        $terbayar = floatval(str_replace(",", "", $request->jumlah_dibayar));
        $sisa = $jml - $terbayar;
        $jenis = '-';
        if ($sisa > 0 && $akun->jenis == 'Keluar') $jenis = 'Utang';
        else if ($sisa > 0 && $akun->jenis == 'Masuk') $jenis = 'Piutang';

        $tr_proyek->tanggal_transaksi = DateTime::CreateFromFormat('Y-m-d', $request->tanggal_transaksi);
        $tr_proyek->id_akun_tr_proyek = $request->jenis_transaksi;
        $tr_proyek->id_pemasok = $request->id_pemasok;
        $tr_proyek->nama_material = $request->nama_material;
        $tr_proyek->jumlah_material = $request->jumlah_material;
        $tr_proyek->satuan_material = $request->satuan_material;
        $tr_proyek->id_proyek = $request->id_proyek;
        $tr_proyek->id_akun_neraca = $request->akun_neraca;
        $tr_proyek->jumlah = $jml;
        $tr_proyek->terbayar = $terbayar;
        $tr_proyek->sisa = $sisa;
        $tr_proyek->jenis = $jenis;

        $tr_proyek->save();

        $gudang = Gudang::where('id_transaksi', '=', $request->id)->first();
        if (!(is_null($gudang))) {
            $gudang->nama_barang = $request->nama_material;
            $gudang->satuan = $request->satuan_material;
            $gudang->jumlah = $request->jumlah_material;
            $gudang->jenis = 'Masuk';
            $gudang->harga_satuan = (floatval(str_replace(",", "", $request->jumlah_transaksi)) / $request->jumlah_material);
        }

        return redirect()->route('transaksi_proyek');
    }

    public function delete(Request $request)
    {
        // dd($request);
        try {
            TransaksiProyek::find($request->id)->delete();
            $gudang = Gudang::where('id_transaksi', '=', $request->id)->first();
            if (!(is_null($gudang))) $gudang->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return $request->id;
    }
}
