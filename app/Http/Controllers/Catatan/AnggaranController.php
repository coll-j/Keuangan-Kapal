<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Catatan\Anggaran;
use App\Models\Perusahaan;

class AnggaranController extends Controller
{
    //
    public function edit(Request $request){
        // dd($request);
        foreach ($request->except('_token') as $key => $value) {
            $id_akun = intval(str_replace('akun-', '', $key));
            $anggaran = Anggaran::where('id_perusahaan', Auth::user()->id_perusahaan)
                        ->where('id_akun_tr_proyek', $id_akun)
                        ->where('id_proyek', $request->id_proyek)
                        ->first();

            if(!(is_null($anggaran)))
            {
                $anggaran->nominal = floatval(str_replace(',', '', $value));
                $anggaran->save();
            }
        }
        $perusahaan = Perusahaan::where('id', '=', Auth::user()->id_perusahaan)->first();
        return redirect()->route('anggaran');
        // return view('catatan/anggaran', [
        //     'perusahaan' => $perusahaan, 
        // ]);
    }
}
