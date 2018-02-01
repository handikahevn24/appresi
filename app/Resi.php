<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    //
    protected $table = 'resi';

    protected $primaryKey = "noresi";
    public $incrementing = false;

    protected $fillable = [
        'tanggal_resi',
        'noresi',
        'id_toko',
        'nama_konsumen',
        'hp_konsumen',
        'provinsi',
        'alamat',
        'ekpedisi',
        'ongkir'

    ];

    public function toko()
    {
        return $this->belongsTo('App\Toko', 'id_toko');
    }
    public function scopeToko($query, $id_toko)
    {
        return $query->where('id_toko', $id_toko);
    }
    public function scopeEkpedisi($query, $ekpedisi)
    {
        return $query->where('ekpedisi', $ekpedisi);
    }
}
