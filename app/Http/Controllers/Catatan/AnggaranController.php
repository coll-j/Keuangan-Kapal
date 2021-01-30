<?php

namespace App\Http\Controllers\Catatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    //
    public function edit(Request $request){
        // dd($request);
        foreach ($request->except('_token') as $key => $value) {
            echo 'key '. $key;
            echo ' value '. $value;
            echo '</br>';
            // $key gives you the key. 2 and 7 in your case.
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
        return;
    }
}
