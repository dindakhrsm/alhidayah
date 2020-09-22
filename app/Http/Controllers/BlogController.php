<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Image;
use App\Video;
use App\Http\Requests;
use App\Kategoritransaksi;
use Carbon\Carbon;
use App\Tag;
use App\Transaksi;

class BlogController extends Controller
{
    //$
    protected $limit = 3;
    public $carbon,$categories,$tags;

    public function __construct()
    {
        $this->carbon=new Carbon();
        $this->categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $this->tags = Tag::all();
    }

    public function index()
    {
       $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $tags = Tag::all();
       // $categories = Category::all();
      $posts = Post::with('author')
          ->orderBy('created_at', 'desc')
          ->where("published_at", "<=", Carbon::now());
         /* ->paginate(3);*/

      //check if any term entered
      if($term = request('term'))
      {
          $posts->where('title', 'LIKE', "%$term%");
          $posts->orWhere('excerpt', 'LIKE', "%$term%");
      }
     $posts = $posts->paginate($this->limit);
        $slider = Image::with('author')->get();
//        dd($slider->first() ? "true" : false);
//        dd($slider->first() == true ? "firstData" ? "false");

        return view("blog.index", compact('posts', 'categories' , 'tags', 'slider'));
        //view('blog.index', compact('posts'))->render();
       // dd(\DB::getQueryLog());

    }


    public function category($id)
    {
       $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $tags = Tag::all();

        $posts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->where('category_id', $id)
            ->paginate(3);
        return view("blog.index", compact('posts', 'categories', 'tags'));
    }

    public function tag($id)
    {
     $tags = Tag::all();
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();

        $posts = Post::with('author')->orderBy('created_at', 'desc')
            ->where('category_id', $id)
            ->paginate(3);

        return view("blog.index", compact('posts', 'tags', 'categories'));
    }



    public function show($id)
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $tags = Tag::all();
        $post = Post::where("published_at", "<=", Carbon::now())->findOrFail($id);
        $postComments = $post->comments()->paginate(3);
        return view('blog.show', compact('post', 'categories', 'tags', 'postComments'));
    }

    public function profil()
    {
        $categories = Category::with('posts')->orderBy('title', 'asc')->get();
        $tags = Tag::all();
        $posts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->where("published_at", "<=", Carbon::now())
            ->paginate(3);
        return view('blog.profil', compact('posts','categories', 'tags'));
    }

    public function gallery()
    {
        return view('blog.gallery');
    }

    public function foto()
    {
        return view('blog.foto');
    }

    public function video()
    {
        $videos = Video::with('author')->get();
//        dd($posts->pluck('body'));
        return view('blog.video', compact('videos'));
    }



    public function keuangan(Request $request)
    {

        $kategori = Kategoritransaksi::all();

        if(!isset($request)){
            $dari = $request->dari;
            $sampai = $request->sampai;
            $id_kategori = $request->kategori;
        }else{
            $dari = $this->carbon->startOfYear()->format('Y-m-d');
            $sampai = $this->carbon->endOfYear()->format('Y-m-d');
            $id_kategori = 'semua';
        }

        if($id_kategori == "semua"){
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }else{
            $laporan = Transaksi::where('kategori_id',$id_kategori)
                ->whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }
        return view('blog.keuangan', [
            'kategori' => $kategori,
            'laporan' => $laporan,
            'carbon'=>$this->carbon,
            'dari'=>$dari,
            'sampai'=>$sampai,
            'kat'=>$id_kategori,
            'categories'=>$this->categories,
            'tags'=>$this->tags
            ]);
    }


    public function keuangan_hasil(Request $request)
    {
        $request->validate([
            'dari' => 'required',
            'sampai' => 'required']);

        // dd($request->dari);
        // data kategori
        $kategori = Kategoritransaksi::all();

        // data filter
        $dari = $request->dari;
        $sampai = $request->sampai;
        $id_kategori = $request->kategori;

        // periksa kategori yang dipiliih
        if($id_kategori == "semua"){
            // jika semua, tampilkan semua transaksi
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }else
        {
            // jika yang dipilih bukan "semua",
            ////tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::where('kategori_id',$id_kategori)
                ->whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }

        // passing data laporan ke view laporan
        return view('blog.keuangan', [
            'kategori' => $kategori,
            'laporan' => $laporan,
            'carbon'=>$this->carbon,
            'dari'=>$dari,
            'sampai'=>$sampai,
            'kat'=>$id_kategori,
            'categories'=>$this->categories,
            'tags'=>$this->tags
            ]);
    }

}
