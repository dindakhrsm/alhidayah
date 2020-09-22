<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    //
    protected $fillable = ['judul_gambar', 'ket_gambar', 'imagecategory_id', 'image'];
// protected $dates = ['published_at'];


    public function author()
    {
        //satu ImAge hanya dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }

    public function imagecategory()
    {
        return $this->belongsTo(Imagecategory::class);
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
