<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AkunTransaksiProyek;
use App\Models\AkunTransaksiKantor;
use App\Models\Pemasok;
use App\Models\Proyek;
use App\Models\AkunNeracaSaldo;
use App\Models\Gudang;

use App\Models\Catatan\TransaksiProyek;
use App\Models\Catatan\TransaksiKantor;
use App\Models\Catatan\Anggaran;
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
        $proyeks = Proyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                        ->where('status', 'Aktif')
                        ->get();
        $pendapatans = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                    ->where('jenis', 'Masuk')
                    ->get();
        $biayas = AkunTransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis', 'Keluar')
                ->get();

        
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
            ->whereBetween('tanggal_transaksi', [$start, $end])->get();

            $date_range = str_replace('-', '/', $date_range);
            $date_range = str_replace(' / ', ' - ', $date_range);
            
            // Hitung pemasukan dan pengeluaran Bank
            // Diambil dari catatan kantor dan proyek
            $total_tr_proyeks_masuk_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_kantors_masuk_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            $total_tr_kantors_keluar_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');
        }
        else
        {
            $catatan_tr_proyeks = TransaksiProyek::with('akun_tr_proyek', 'pemasok', 'proyek', 'akun_neraca')
                               ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();

            // Hitung pemasukan dan pengeluaran Bank
            // Diambil dari catatan kantor dan proyek
            $total_tr_proyeks_masuk_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_kantors_masuk_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            $total_tr_kantors_keluar_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');
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

        $bank_sum = $bank_sum + $total_tr_proyeks_masuk_bank + $total_tr_kantors_masuk_bank
                    - $total_tr_proyeks_keluar_bank - $total_tr_kantors_keluar_bank;
        //

        // dd($bank_sum, $total_tr_kantors_keluar_bank, $total_tr_kantors_masuk_bank, $total_tr_proyeks_keluar_bank, $total_tr_proyeks_masuk_bank);
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
    
    public function pageTransaksiKantor($date_range = null){
        if(!(is_null($date_range)))
        {
            $separated = explode(' - ', $date_range);
            $start = Carbon::CreateFromFormat('d-m-Y', $separated[0])->startOfDay();
            $end = Carbon::CreateFromFormat('d-m-Y', $separated[1])->endOfDay();
            $catatan_tr_kantors = TransaksiKantor::with('akun_tr_kantor', 'akun_neraca')
            ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereBetween('tgl_transaksi', [$start, $end])
            ->get();

            $date_range = str_replace('-', '/', $date_range);
            $date_range = str_replace(' / ', ' - ', $date_range);

            $total_tr_proyeks_masuk_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_kantors_masuk_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            $total_tr_kantors_keluar_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            // Kas
            $total_tr_proyeks_masuk_kas = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_kas = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tanggal_transaksi', '<=', $end)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('terbayar');

            $total_tr_kantors_masuk_kas = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('jumlah');

            $total_tr_kantors_keluar_kas = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereDate('tgl_transaksi', '<=', $end)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('jumlah');
        }
        else
        {
            $catatan_tr_kantors = TransaksiKantor::with('akun_tr_kantor', 'akun_neraca')
                               ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();

            $total_tr_proyeks_masuk_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_bank = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('terbayar');

            $total_tr_kantors_masuk_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            $total_tr_kantors_keluar_bank = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Bank');
            })->sum('jumlah');

            // Kas
            $total_tr_proyeks_masuk_kas = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('terbayar');

            $total_tr_proyeks_keluar_kas = TransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_proyek', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('terbayar');

            $total_tr_kantors_masuk_kas = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Masuk');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('jumlah');

            $total_tr_kantors_keluar_kas = TransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
            ->whereHas('akun_tr_kantor', function($query){
                $query->where('jenis', 'Keluar');
            })->whereHas('akun_neraca', function($query){
                $query->where('jenis_akun', 'Kas');
            })->sum('jumlah');

        }

        $akun_tr_kantors = AkunTransaksiKantor::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $akun_neracas = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                        ->where('jenis_akun', '!=', 'Lainnya')
                        ->get();
        $kas_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis_akun', '=', 'Kas')
                    ->sum('saldo');
        $bank_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis_akun', '=', 'Bank')
                    ->sum('saldo');
        
        $bank_sum = $bank_sum + $total_tr_proyeks_masuk_bank + $total_tr_kantors_masuk_bank
        - $total_tr_proyeks_keluar_bank - $total_tr_kantors_keluar_bank;

        $kas_sum = $kas_sum + $total_tr_proyeks_masuk_kas + $total_tr_kantors_masuk_kas
        - $total_tr_proyeks_keluar_kas - $total_tr_kantors_keluar_kas;

        return view('catatan/transaksi_kantor', [
            'catatan_tr_kantors' => $catatan_tr_kantors,
            'akun_tr_kantors' => $akun_tr_kantors,
            'akun_neracas' => $akun_neracas,
            'date_range' => $date_range,
            'kas_sum' => $kas_sum,
            'bank_sum' => $bank_sum,
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
