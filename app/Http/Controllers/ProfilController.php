<?php

namespace App\Http\Controllers;
use App\Category;
use App\Kategoritransaksi;
use App\Post;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Profil;


class ProfilController extends Controller
{


    public function profil($id)
    {
          $categories = Category::with('posts')->orderBy('title', 'asc')->get();
       // $tags = Tag::all();
        $posts = Profil::with('author')->findOrFail($id);
        return view('blog.profil', compact('posts', 'categories'));
    }


}
