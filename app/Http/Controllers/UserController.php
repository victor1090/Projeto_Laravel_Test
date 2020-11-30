<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*public function listUser(){
      $user = new User();
        $user->name = "Victor Santos";
        $user->email = "victor1090@academico.ufs.br";
        $user->password = Hash::make("123");
        $user->save();

        $user = User::where('id','=',1)->first();
        return view('listUser',['user' => $user]);
    } */

    public function listAllUsers(){
        $users = User::all();
        return view('listAllUsers',['users' =>$users]);
    }
    public function listUser(User $user){
        return view('listUser',['user' =>$user]);
    }
    public function FormAddUser(){
        return view('addUser');
    }

    public function newUser(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->senha);
        $user->save();

        return redirect()->route('users.listAll');


    }

    public function FormEditUser(User $user){
        return view('editUser',['user'=>$user]);
    }

    public function edit(User $user,Request $request){
        $user->name = $request->name;
        if(filter_var($request->email,FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        if(!empty($request->senha)){
            $user->password = Hash::make($request->senha);
        }
        $user->save();

        return redirect()->route('users.listAll');
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->route('users.listAll');
    }
}
