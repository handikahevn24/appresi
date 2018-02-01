<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $fillable = [
        'nama_toko'
    ];
    public function toko()
    {
        return $this->hasMany('App\Resi', 'id_toko');
    }
}
