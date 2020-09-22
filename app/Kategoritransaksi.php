<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoritransaksi extends Model
{
    //
    protected $table = "kategoritransaksi";
    protected $fillable = ["kategori"];

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
