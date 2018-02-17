<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    //
    protected $table = 'indonesia_provinces';

    public function provinsi()
    {
        return $this->hasMany('App\Resi', 'id_provinsi');
    }

}
