<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function pageLabaRugiKantor(){
        return view('laporan.laba_rugi_kantor', ['active' => 'laba_rugi_kantor']);
    }

    public function pageLabaRugiProyek(){
        return view('laporan.laba_rugi_proyek', ['active' => 'laba_rugi_proyek']);
    }

    public function pageLabaRugi(){
        return view('laporan.laba_rugi', ['active' => 'laba_rugi']);
    }
}
