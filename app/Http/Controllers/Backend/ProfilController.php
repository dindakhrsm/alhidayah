<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Profil;

class ProfilController extends BackendController
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
        $posts = Profil::with( 'author')->latest()->paginate($this->limit);
        $postCount = Profil::count();
        return view("backend.profil.index", compact('posts', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*   dd('create new post');*/
        $post = new Profil();
        return view('backend.profil.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProfilRequest $request)
    {
        //
        /*   $this->validate($request, []);*/
        // dd($request);
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);
        return redirect('/backend/profil/index')->with('message', 'Profil Berhasil Disimpan!');
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
    {   $post = Profil::findOrFail($id);
        return view('backend.profil.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProfilRequest $request, $id)
    {
        //
        $post = Profil::findOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        return redirect('/backend/profil/index')->with('message', 'Profil Berhasil Diubah!');
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
        $post = Profil::findOrFail($id);
        $post->delete();
        return redirect('/backend/profil/index')->with('message', 'Profil Berhasil Dihapus!');
    }
}
