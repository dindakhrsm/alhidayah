<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Imagecategory extends Model
{
    //

    protected $fillable = ['nama_kategori', 'slug'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
