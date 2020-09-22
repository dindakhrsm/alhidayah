<?php


namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Video;
use App\Imagecategory;
use App\User;

class VideoController extends BackendController
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
        $videos = Video::with('author')->latest()->paginate($this->limit);
        $videoCount = Video::count();
        return view("backend.video.index", compact('videos', 'videoCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*   dd('create new post');*/
        $video = new Video();
        return view('backend.video.create', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Requests\VideoRequest $request)
    {
        //
        /*   $this->validate($request, []);*/
        // dd($request);
        $data = $this->handleRequest($request);
        $request->user()->videos()->create($data);
        return redirect('/backend/video/index')->with('message', 'Video Berhasil Disimpan!');
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
    {   $video = Video::findOrFail($id);
        return view('backend.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\VideoRequest $request, $id)
    {
        //
        $video = Video::findOrFail($id);
        $data = $this->handleRequest($request);
        $video->update($data);
        return redirect('/backend/video')->with('message', 'Video Berhasil Diubah!');
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
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect('/backend/video/index')->with('message', 'Video Berhasil Dihapus!');
    }
}
