<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();
        return view("backend.users.index", compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $isSuperadmin=Auth::user()->hasRole('superadmin');
        if($isSuperadmin){
            $roles = Role::pluck('name','name')->all();
        }else{
            $roles = Role::where('id','<>',1)->pluck('name','name')->all();
        }
        $user = new User();
        $userRole=[];
        return view('backend.users.create', compact('user','roles','userRole'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $user->assignRole($data['roles']);
        return redirect('/backend/users')->with('message', 'user telah berhasil ditambahkan!');
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
        $isSuperadmin=Auth::user()->hasRole('superadmin');
        if($isSuperadmin){
            $roles = Role::pluck('name','name')->all();
        }else{
            $roles = Role::where('id','<>',1)->pluck('name','name')->all();
        }
        $user = User::findOrFail($id);
        $userRole = $user->roles->pluck('name','name')->all();
        return view('backend.users.edit', compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        //
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::findOrFail($id);
        $user->update($data);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($data['roles']);
        // User::findOrFail($id)->update($data);
        return redirect('/backend/users')->with('message', 'user telah berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        //
       $user = User::findOrFail($id);
        $user->delete();
        return redirect('/backend/users')->with('message', 'user telah berhasil dihapus!');
    }
}
