<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Image;
use App\Imagecategory;
use App\User;

class ImageController extends BackendController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path('img');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //  $posts = Post::all();
        $images = Image::with('imagecategory', 'author')->latest()->paginate($this->limit);
        $imageCount = Image::count();
        return view("backend.galeri.index", compact('images', 'imageCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*   dd('create new post');*/
        $image = new Image();
        return view('backend.galeri.create', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Requests\ImageRequest $request)
    {
        //
        /*   $this->validate($request, []);*/
        // dd($request);
        $data = $this->handleRequest($request);
        $request->user()->images()->create($data);
        return redirect('/backend/galeri/index')->with('message', 'Foto Berhasil Disimpan!');
    }

    private function handleRequest($request)
    {
        $data = $request->all();
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination, $fileName);
            $data['image'] = $fileName;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $image = Image::findOrFail($id);
        return view('backend.galeri.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ImageRequest $request, $id)
    {
        //
        $image = Image::findOrFail($id);
        $data = $this->handleRequest($request);
        $image->update($data);
        return redirect('/backend/galeri')->with('message', 'Gambar Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /*Post::findOrFail($id)->delete();*/
        $image = Image::findOrFail($id);
        $image->delete();
        return redirect('/backend/galeri/index')->with('message', 'Image Berhasil Dihapus!');
    }
}
