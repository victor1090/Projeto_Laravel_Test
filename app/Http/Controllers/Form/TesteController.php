<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TesteController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('listAllUsers',['users' =>$users]);
    }


    public function create()
    {
        return view('addUser');
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->senha);
        $user->save();

        return redirect()->route('user.index');
    }


    public function show(User $user)
    {
        return view('listUser',['user' =>$user]);
    }


    public function edit(User $user)
    {
        return view('editUser',['user'=>$user]);
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        if(filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        if(!empty($request->senha)){
            $user->password = Hash::make($request->senha);
        }
        $user->save();

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function debug(Request $request)
    {
        var_dump($request->except('_token'));

        $post = new Post();
        //$post->title = $request->title;
        //$post->author = $request->author;
        //$post->subtitle = $request->subtitle;
        //$post->content =$request->content;
        //$post->save();
        $post->create($request->except((['_token']))); //usando Fillable no Post.php
    }

    public function addForm()
    {
        return view('formPoster');
    }
}
