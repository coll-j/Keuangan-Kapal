<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{

    protected $tabel = 'gudangs';
    protected $guarded = [];

    protected $fillable = [
        'id_perusahaan',
        'nama_barang',
        'id_parent',
        'id_transaksi',
        'satuan',
        'jumlah',
        'jenis',
        'sisa',
        'keterangan',
        //  'harga_satuan',
    ];

    public function perusahaan()
    {
        return $this->belongsTo('\App\Models\Perusahaan', 'id_perusahaan', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo('\App\Models\Catatan\TransaksiProyek', 'id_transaksi', 'id');
    }
}
