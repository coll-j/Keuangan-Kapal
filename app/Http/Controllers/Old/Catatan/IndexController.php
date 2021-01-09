<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function pageNeraca(){
        return view('catatan.neraca', ['active' => 'neraca']);
    }

    public function pageAnggaran(){
        return view('catatan.anggaran', ['active' => 'anggaran']);
    }
}
