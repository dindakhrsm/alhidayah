<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalkajian extends Model
{
    //
    protected $fillable = ['hari','tanggal', 'jam', 'tempat', 'narasumber', 'tema'];


    public function author()
    {
        //satu Post hanya dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }


    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        //pastikan pada Post memiliki gambar
        if (! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/". $this->image);
        }

        return $imageUrl;
    }

}
