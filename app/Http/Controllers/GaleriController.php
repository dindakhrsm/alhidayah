<?php

namespace App\Http\Controllers;


use App\Image;
use App\Imagecategory;



class GaleriController extends Controller
{
    protected $limit = 3;
    public $kategoris;

    public function kategori()
    {

       /* $kategoris = Imagecategory::all();
        return view('blog.kategori_foto', compact('kategoris'));*/

        $kategoris = Imagecategory::with('images')->orderBy('nama_kategori', 'asc')->get();

        /*$images = Image::with('author')
            ->orderBy('created_at', 'desc')
            ->where('imagecategory_id', $id)
            ->paginate(3);*/
        return view("blog.kategori_foto", compact( 'kategoris'));
    }

    public function foto($id)
    {
        $kategoris = Imagecategory::with('images')->orderBy('nama_kategori', 'asc')->get();
        //$images = Image::all();
        $images = Image::with('author')
            ->orderBy('created_at', 'desc')
            ->where('imagecategory_id', $id)
            ->paginate(3);
        return view('blog.showfoto', compact('images', 'kategoris'));
    }


}
