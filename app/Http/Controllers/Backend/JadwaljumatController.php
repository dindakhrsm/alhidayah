<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jadwaljumat;

use App\User;

class JadwaljumatController extends BackendController
{

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
        $posts = Jadwaljumat::with( 'author')->latest()->paginate($this->limit);
        $postCount = Jadwaljumat::count();
        return view("backend.jadwaljumatan.index", compact('posts', 'postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*   dd('create new post');*/
        $post = new Jadwaljumat();
        return view('backend.jadwaljumatan.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\JadwaljumatRequest $request)
    {
        //
        /*   $this->validate($request, []);*/
        // dd($request);
        $data = $this->handleRequest($request);
        $request->user()->jadwaljumats()->create($data);
        return redirect('/backend/jadwaljumatan/index')->with('message', 'Jadwal Berhasil Disimpan!');
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
    {   $post = Jadwaljumat::findOrFail($id);
        return view('backend.jadwaljumatan.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\JadwaljumatRequest $request, $id)
    {
        //
        $post = Jadwaljumat::findOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        return redirect('/backend/jadwaljumatan/index')->with('message', 'Jadwal Berhasil Diubah!');
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
        $post = Jadwaljumat::findOrFail($id);
        $post->delete();
        return redirect('/backend/jadwaljumatan/index')->with('message', 'Jadwal Berhasil Dihapus!');
    }
}
