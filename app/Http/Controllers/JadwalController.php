<?php

namespace App\Http\Controllers;
use App\Category;
use App\Jadwaljumat;
use App\Jadwalkajian;

use Carbon\Carbon;
use Illuminate\Http\Request;



class JadwalController extends Controller
{
    protected $limit = 5;

    public function jumatan()
    {

       // return view('blog.jadwal_jumatan');
        //
        $posts = Jadwaljumat::with( 'author')->latest()->paginate($this->limit);
        $postCount = Jadwaljumat::count();
        return view("blog.jadwal_jumatan", compact('posts', 'postCount'));
    }

    public function kajian()
    {

        // return view('blog.jadwal_jumatan');
        //
        $posts = Jadwalkajian::with( 'author')->latest()->paginate($this->limit);
        $postCount = Jadwalkajian::count();
        return view("blog.jadwal_kajian", compact('posts', 'postCount'));
    }


}
