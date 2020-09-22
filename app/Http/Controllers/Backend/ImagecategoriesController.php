<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Imagecategory;
use App\Post;

class ImagecategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Imagecategory::with('images')->orderBy('nama_kategori')->paginate($this->limit);
        $categoriesCount = Imagecategory::count();
        return view("backend.kategorigaleri.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = new Imagecategory();
        return view('backend.kategorigaleri.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoryimageStoreRequest $request)
    {
        //
        Imagecategory::create($request->all());
        return redirect('/backend/kategorigaleri')->with('message', 'kategori telah berhasil ditambahkan!');
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
    {
        //
        $category = Imagecategory::findOrFail($id);
        return view('backend.kategorigaleri.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Requests\CategoryimageUpdateRequest $request, $id)
    {
        //
        Imagecategory::findOrFail($id)->update($request->all());
        return redirect('/backend/kategorigaleri')->with('message', 'kategori telah berhasil diubah!');
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
        /*  Post::withTrashed()->where('category_id', $id)->update(['category_id'=> config('cms.default_category_id')]);
         $category = Category::findOrFail($id);
          $category->delete();*/
        Imagecategory::findOrFail($id)->delete();
        return redirect('/backend/kategorigaleri')->with('message', 'kategori telah berhasil dihapus!');
    }
}
