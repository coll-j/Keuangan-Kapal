<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)->get();
        $inventoris = Gudang::where('id_perusahaan', '=', Auth::user()->id_perusahaan)
                    ->where('jenis', '=', 'Masuk')->get();
        // dd($inventoris);
        return view('catatan/gudang', compact('items', 'inventoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $perusahaan = Perusahaan::with('user')->get()->where('kode_perusahaan', '=', Auth::user()->kode_perusahaan)->first();
        $parent = Gudang::find($request->id_parent);
        if (!empty($perusahaan)) {
            Gudang::create([
                'id_parent' => $request->id_parent,
                'nama_barang' => $parent->nama_barang,
                'satuan' => $parent->satuan,
                'jumlah' => $request->jumlah,
                'jenis' => 'Keluar',
                // 'harga_satuan' => $request->harga_satuan,
                'id_perusahaan' => $perusahaan->id
            ]);
            return redirect()->route('gudang');
        } else {
            //kalau belum ada perusahaan, data tidak bisa masuk hehehe
            return redirect()->route('gudang');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        // $itemGudang = Gudang::find($id);
        // $itemGudang = Gudang::where('id', $id)->first();

        Gudang::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
        ]);

        // $itemGudang->nama_barang = $request->nama_barang;
        // $itemGudang->satuan = $request->satuan;
        // $itemGudang->jumlah = $request->jumlah;
        // $itemGudang->harga_satuan = $request->harga_satuan;
        // $itemGudang->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Gudang::where('id', $id)->destroy();
    }
}
