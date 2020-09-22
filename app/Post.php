<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'excerpt', 'body', 'published_at', 'category_id', 'image'];
    protected $dates = ['published_at'];

    public function author()
    {
        //satu Post hanya dimiliki oleh satu user
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setPublishedAttribute($value)
    {
        $this->attributes['published_at'] = $value ? : NULL;
    }

    //
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

    public function getDateAttribute($value)
    {
        //return $this->created_at->diffForHumans();
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function dateFormatted($showTimes = False)
    {
        $format = "d/m/Y";
        if ($showTimes) $format = $format . "H:i:s" ;
        return $this->created_at->format($format);

    }

    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL ;
    }

    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL ;
    }

    public function publicationLabel()
    {
        if(! $this->published_at){
            return '<span class="label label-warning">Draft</span>';
        }
        elseif($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Schedule</span>';
        }
        else{
            return '<span class="label label-success">Published</span>';
        }
    }

    public function scopePublished()
    {
        return $this->where("published_at", "<=", Carbon::now());
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getTagsHtmlAttribute()
    {
        $anchors = [];
        foreach($this->tags as $tag){

            $anchors[] = '<a href="' . route('tag', $tag->slug) .'">' . $tag->name . '</a>';
        }
        return implode(", " , $anchors);

    }

    public function createComment(array $data)
    {
        $this->comments()->create($data);
    }



    /* public function scopePopular($query)
     {
         return $query->orderBy('view_count', 'desc');
     }*/

    /*  public function scopeLatestFirst()
      {
          return $this->orderBy('created_at', 'desc');
      }*/
}