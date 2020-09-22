<?php

namespace App;

use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    //
    protected $fillable = ['title', 'body', 'image'];
// protected $dates = ['published_at'];


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

