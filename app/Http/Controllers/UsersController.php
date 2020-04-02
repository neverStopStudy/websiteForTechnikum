<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Storage;
use App\Image;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles','permissions')->get(['id','name']);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($request->imgs){
            $index = 1;
            foreach($request->imgs as $img){
                $ext = $img->extension();
                $path = $user->name . "_" . $index . "." . $ext;
                $file = $img->storeAs('public', $path);
                $url = Storage::url($file);

                $image = new Image();
                if ($index == 1) $image->main = true;
                $image->link = $url;
                $image->save();
                $user->images()->attach($image);
                $index++;
            }
        }
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("admin.users.show", ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\id $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        
        if($user->roles()->where('slug','admin')->get()->isNotEmpty())
        {
            $roles = Role::all();
            $permissions = Permission::all();
            return view("admin.users.edit", ['user' => $user,'roles' => $roles, 'permissions' => $permissions]);
        } else {
            return view("user.users.edit", ['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        if($request->imgs){
            $index = 1;
            foreach($request->imgs as $img){
                $ext = $img->extension();
                $path = $user->name . "_" . $index . "." . $ext;
                $file = $img->storeAs('public', $path);
                $url = Storage::url($file);

                $image = new Image();
                if ($index == 1) $image->main = true;
                $image->link = $url;
                $image->save();
                $user->images()->attach($image);
                $index++;
            }
        }
        
        return redirect()->route('home');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->images()->delete();
        User::destroy($id);
        return redirect()->back();
    }
}
