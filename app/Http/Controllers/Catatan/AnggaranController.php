<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Catatan\Anggaran;

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
            // echo 'id akun '. $id_akun;
            // echo ' value '. $value;
            // echo '</br>';
        }
        // echo $request['akun-1'];
        // find proyek
        // for every request
        /*
        ex:
        proyek = proyek->find(id)
        for req in request:
            if req.key diawali "akun-":
                id_akun = req.key[len("akun-"):]
                record_anggaran = anggaran->where('id_proyek == proyek->id and id_akun == id_akun')
                record_anggaran->value = request[req.key]
                record_anggaran->save()
        */
        return redirect()->route('anggaran');
    }
}
