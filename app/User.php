<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Post::class, 'author_id');
    }

    public function profil()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Profil::class, 'author_id');
    }

    public function images()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Image::class, 'author_id');
    }

    public function jadwaljumats()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Jadwaljumat::class, 'author_id');
    }

    public function jadwalkajians()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Jadwalkajian::class, 'author_id');
    }

    public function videos()
    {
        //satu user bisa memiliki banyak post;
        return $this->hasMany(Video::class, 'author_id');
    }
}
