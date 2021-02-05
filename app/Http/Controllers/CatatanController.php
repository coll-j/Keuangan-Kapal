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
use App\Models\Perusahaan;

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
    public function pageNeraca($date_range = null){
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
        }
        // ASET LANCAR
        $aset_lancar = [];
        // KAS BANK
        foreach(AkunNeracaSaldo::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis_neraca', 'Aset Lancar')
                ->get() as $neraca_saldo_aset_lancar)
        {
            $saldo_awal = $neraca_saldo_aset_lancar->saldo;

            $masuk_proyek = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('id_akun_neraca', $neraca_saldo_aset_lancar->id)
                            ->whereHas('akun_tr_proyek', function($query){
                                $query->where('jenis', 'Masuk');
                            });

            if(!(is_null($date_range))) $masuk_proyek = $masuk_proyek->whereDate('tanggal_transaksi', '<=', $end);
                            
            $masuk_proyek = $masuk_proyek->sum('terbayar');

            $keluar_proyek = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('id_akun_neraca', $neraca_saldo_aset_lancar->id)
                            ->whereHas('akun_tr_proyek', function($query){
                                $query->where('jenis', 'Keluar');
                            });

            if(!(is_null($date_range))) $keluar_proyek = $keluar_proyek->whereDate('tanggal_transaksi', '<=', $end);
            
            $keluar_proyek = $keluar_proyek->sum('terbayar');

            $masuk_kantor = TransaksiKantor::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('id_akun_neraca', $neraca_saldo_aset_lancar->id)
                            ->whereHas('akun_tr_kantor', function($query){
                                $query->where('jenis', 'Masuk');
                            });

            if(!(is_null($date_range))) $masuk_kantor = $masuk_kantor->whereDate('tgl_transaksi', '<=', $end);
            
            $masuk_kantor = $masuk_kantor->sum('jumlah');

            $keluar_kantor = TransaksiKantor::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('id_akun_neraca', $neraca_saldo_aset_lancar->id)
                            ->whereHas('akun_tr_kantor', function($query){
                                $query->where('jenis', 'Keluar');
                            });

            if(!(is_null($date_range))) $keluar_kantor = $keluar_kantor->whereDate('tgl_transaksi', '<=', $end);
                            
            $keluar_kantor = $keluar_kantor->sum('jumlah');

            $saldo_akhir = $saldo_awal + $masuk_proyek + $masuk_kantor - $keluar_kantor - $keluar_proyek;

            $aset_lancar[$neraca_saldo_aset_lancar->nama] = $saldo_akhir;
        }
        // END KAS BANK

        // PIUTANG USAHA
        $piutang_usaha = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('jenis', 'Piutang');

        if(!(is_null($date_range))) $piutang_usaha = $piutang_usaha->whereBetween('tanggal_transaksi', [$start, $end]);
                        
        $piutang_usaha = $piutang_usaha->sum('sisa');

        $aset_lancar['Piutang Usaha'] = $piutang_usaha;
        // END PIUTANG USAHA
        // END ASET LANCAR

        // ASET TETAP
        $aset_tetap = [];
        foreach(AkunNeracaSaldo::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis_neraca', 'Aset Tetap')
                ->get() as $neraca_saldo_aset_tetap)
        {
            $aset_tetap[$neraca_saldo_aset_tetap->nama] = $neraca_saldo_aset_tetap->saldo;
        }
        // END ASET TETAP

        // KEWAJIBAN LANCAR
        $kewajiban_lancar = [];
        
        // UTANG USAHA
        $utang_usaha = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->where('jenis', 'Utang');

        if(!(is_null($date_range))) $utang_usaha = $utang_usaha->whereBetween('tanggal_transaksi', [$start, $end]);
        $utang_usaha = $utang_usaha->sum('sisa');

        $kewajiban_lancar['Utang Usaha'] = $utang_usaha;
        // END UTANG USAHA

        // END KEWAJIBAN LANCAR

        // KEWAJIBAN JANGKA PANJANG
        $kewajiban_jangka_panjang = [];
        foreach(AkunNeracaSaldo::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis_neraca', 'Kewajiban Panjang')
                ->get() as $neraca_saldo_kewajiban_panjang)
        {
            $kewajiban_jangka_panjang[$neraca_saldo_kewajiban_panjang->nama] = $neraca_saldo_kewajiban_panjang->saldo;
        }
        // END KEWAJIBAN JANGKA PANJANG

        // EKUITAS
        $ekuitas = [];
        foreach(AkunNeracaSaldo::where('id_perusahaan', Auth::user()->id_perusahaan)
                ->where('jenis_neraca', 'Ekuitas')
                ->get() as $neraca_saldo_ekuitas)
        {
            $ekuitas[$neraca_saldo_ekuitas->nama] = $neraca_saldo_ekuitas->saldo;
        }

        // LABA RUGI BERJALAN
        $pendapatan_proyek = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Masuk');
                            });

        if(!(is_null($date_range))) $pendapatan_proyek = $pendapatan_proyek->whereDate('tanggal_transaksi', [$start, $end]);
        $pendapatan_proyek = $pendapatan_proyek->sum('jumlah');

        $pendapatan_kantor = TransaksiKantor::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_kantor', function($query){
                                return $query->where('jenis', 'Masuk');
                            });

        if(!(is_null($date_range))) $pendapatan_kantor = $pendapatan_kantor->whereDate('tgl_transaksi', [$start, $end]);
        $pendapatan_kantor = $pendapatan_kantor->sum('jumlah');

        $pendapatan_kantor = 0; // Temporary :v
        $pendapatan_all = $pendapatan_proyek + $pendapatan_kantor;

        $pengeluaran_proyek = TransaksiProyek::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_proyek', function($query){
                                return $query->where('jenis', 'Keluar');
                            });

        if(!(is_null($date_range))) $pengeluaran_proyek = $pengeluaran_proyek->whereDate('tanggal_transaksi', [$start, $end]);
        $pengeluaran_proyek = $pengeluaran_proyek->sum('jumlah');

        $pengeluaran_kantor = TransaksiKantor::where('id_perusahaan', Auth::user()->id_perusahaan)
                            ->whereHas('akun_tr_kantor', function($query){
                                return $query->where('jenis', 'Keluar');
                            });

        if(!(is_null($date_range))) $pengeluaran_kantor = $pengeluaran_kantor->whereDate('tgl_transaksi', [$start, $end]);
        $pengeluaran_kantor = $pengeluaran_kantor->sum('jumlah');

        $pengeluaran_all = $pengeluaran_kantor + $pengeluaran_proyek;
        $ekuitas['Laba (Rugi) Berjalan'] = $pendapatan_all - $pengeluaran_all;
        // END LABA RUGI BERJALAN
        // END EKUITAS
        $perusahaan = Perusahaan::with('user')->get()->where('kode_perusahaan', '=', Auth::user()->kode_perusahaan)->first();
        return view('catatan/neraca', compact('aset_lancar', 'aset_tetap', 'kewajiban_lancar',
                    'kewajiban_jangka_panjang', 'ekuitas', 'date_range', 'perusahaan'));
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

        $perusahaan = Perusahaan::with('user')->get()->where('kode_perusahaan', '=', Auth::user()->kode_perusahaan)->first();
        return view('catatan/anggaran', compact('proyeks', 'pendapatans', 'biayas', 'perusahaan'));
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

            // Hitung pemasukan dan pengeluaran Bank
            // Diambil dari catatan kantor dan proyek
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

            // Hitung pemasukan dan pengeluaran Bank
            // Diambil dari catatan kantor dan proyek
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
        
        $akun_tr_proyeks = AkunTransaksiProyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $pemasoks = Pemasok::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $material_barus = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
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
        
        $kas_sum = $kas_sum + $total_tr_proyeks_masuk_kas + $total_tr_kantors_masuk_kas
                    - $total_tr_proyeks_keluar_kas - $total_tr_kantors_keluar_kas;

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
            'material_barus' => $material_barus,
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

    // public function pageGudang($date_range = null)
    // {
    //     if (!(is_null($date_range))) {
    //         $separated = explode(' - ', $date_range);
    //         $start = Carbon::CreateFromFormat('d-m-Y', $separated[0])->startOfDay();
    //         $end = Carbon::CreateFromFormat('d-m-Y', $separated[1])->endOfDay();

    //         // $catatan_gudangs = Gudang::with('perusahaan', 'transaksi')
    //         //     ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)
    //         //     ->whereBetween('catatan_transaksi_proyeks.tanggal_transaksi', [$start, $end])
    //         //     ->get();
    //         // $catatan_gudangs = DB::select('select g.* from gudangs g, perusahaans p, catatan_transaksi_proyeks c 
    //         // where p.id = g.id_perusahaan 
    //         // and c.id = g.id_transaksi')
    //         // ->whereBetween('c.tanggal_transaksi', [$start, $end])
    //         // ->get();

    //         $catatan_gudangs = DB::table('gudangs')
    //             ->join('perusahaans', 'perusahaans.id', '=', 'gudangs.id_perusahaan')
    //             ->join('catatan_transaksi_proyeks', 'catatan_transaksi_proyeks.id', '=', 'gudangs.id_transaksi')
    //             ->select('gudangs.*')
    //             ->whereBetween('catatan_transaksi_proyeks.tanggal_transaksi', [$start, $end])
    //             ->get();

    //         $date_range = str_replace('-', '/', $date_range);
    //         $date_range = str_replace(' / ', ' - ', $date_range);
    //         // dd($start, $end, $catatan_tr_proyeks);
    //     } else {
    //         $catatan_gudangs = Gudang::with('perusahaan', 'transaksi')
    //             ->where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
    //     }

    //     $inventoris = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
    //         ->where('jenis', '=', 'Masuk')->get();
    //     // $transaksis = Pemasok::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
    //     // $proyeks = Proyek::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
    //     // $akun_neracas = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
    //     //     ->where('jenis_akun', '!=', 'Lainnya')
    //     //     ->get();

    //     // $kas_sum = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
    //     //     ->where('jenis_akun', '=', 'Kas')
    //     //     ->sum('saldo');

    //     // $bank_sum = AkunNeracaSaldo::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
    //     //     ->where('jenis_akun', '=', 'Bank')
    //     //     ->sum('saldo');
    //     //dd($date_range);
    //     $perusahaan = Perusahaan::with('user')->get()->where('kode_perusahaan', '=', Auth::user()->kode_perusahaan)->first();
    //     return view('catatan/gudang', [
    //         'items' => $catatan_gudangs,
    //         'date_range' => $date_range,
    //         'inventoris' => $inventoris,
    //         'perusahaan' => $perusahaan,

    //     ]);
    // }/

}
