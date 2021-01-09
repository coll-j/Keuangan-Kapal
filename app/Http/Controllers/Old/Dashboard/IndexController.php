<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function pageIndex(){
        return view('dashboards.index', ['active' => 'dashboard']);
    }

    public function pageProfilPerusahaan(){
        return view('dashboards.profil_perusahaan', ['active' => 'profil_perusahaan']);
    }

    public function pageData(){
        return view('dashboards.data', ['active' => 'page_data']);
    }
}
