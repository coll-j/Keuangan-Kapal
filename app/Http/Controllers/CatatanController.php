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

use DateTime;
use Carbon\Carbon;
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
        $proyeks = Proyek::where('id_perusahaan', Auth::user()->id_perusahaan)->get();
        $pendapatans = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                    ->where('jenis', 'Masuk')
                    ->get();
        $biayas = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis', 'Keluar')
                ->get();
        // dd($proyeks, $pendapatans, $biayas);
        return view('catatan/anggaran', compact('proyeks', 'pendapatans', 'biayas'));
    }

    public function pageTransaksiProyek($date_range = null){
        if(!(is_null($date_range)))
        {
            $separated = explode(' - ', $date_range);
            $start = Carbon::CreateFromFormat('d-m-Y', $separated[0])->startOfDay();
            $end = Carbon::CreateFromFormat('d-m-Y', $separated[1])->endOfDay();
            $catatan_tr_proyeks = TransaksiProyek::with('akun_tr_proyek', 'pemasok', 'proyek', 'akun_neraca')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereBetween('tanggal_transaksi', [$start, $end])
            ->get();

            $date_range = str_replace('-', '/', $date_range);
            $date_range = str_replace(' / ', ' - ', $date_range);
            // dd($start, $end, $catatan_tr_proyeks);
        }
        else
        {
            $catatan_tr_proyeks = TransaksiProyek::with('akun_tr_proyek', 'pemasok', 'proyek', 'akun_neraca')
                               ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        }
        
        $akun_tr_proyeks = AkunTransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $pemasoks = Pemasok::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $proyeks = Proyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $akun_neracas = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                        ->where('jenis_akun', '!=', 'Lainnya')
                        ->get();

        $kas_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis_akun', '=', 'Kas')
                    ->sum('saldo');
        
        $bank_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis_akun', '=', 'Bank')
                    ->sum('saldo');
        // dd($catatan_tr_proyeks->find(1));
        return view('catatan/transaksi_proyek', [
            'catatan_tr_proyeks' => $catatan_tr_proyeks,
            'akun_tr_proyeks' => $akun_tr_proyeks,
            'akun_neracas' => $akun_neracas,
            'pemasoks' => $pemasoks,
            'proyeks' => $proyeks,
            'date_range' => $date_range,
            'kas_sum' => $kas_sum,
            'bank_sum' => $bank_sum,
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
        $piutangs = TransaksiProyek::with('proyek.user')
                    ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis', '=', 'Piutang')
                    ->get();
        $piutang_sum = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                        ->where('jenis', '=', 'Piutang')
                        ->selectRaw('sum(jumlah) as jumlah, sum(terbayar) as terbayar, sum(sisa) as sisa')
                        ->first();

        $utangs = TransaksiProyek::with('pemasok')
                    ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis', '=', 'Utang')
                    ->get();

        $utang_sum = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis', '=', 'Utang')
                    ->selectRaw('sum(jumlah) as jumlah, sum(terbayar) as terbayar, sum(sisa) as sisa')
                    ->first();
        // dd($utangs, $piutangs, $piutang_sum, $utang_sum);
        return view('catatan/hutang_piutang', compact('piutangs', 'piutang_sum', 'utangs', 'utang_sum'));
    }

    public function pageGudang(){
        $inventoris = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        dd($inventoris);
        return view('catatan/gudang', ['inventoris' => $inventoris]);
    }

}
