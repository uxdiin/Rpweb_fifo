<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function about($id){
        $user = User::findOrfail($id);
        return view('users.about',['user'=>$user]);
    }
    public function register2(){
        return view('users.register2');
    }
    public function complete(Request $request){
        $user = User::findOrFail(Auth::id());
        $user->phone =  $request->get('phone');
        if($request->file('avatar')){
            $file=$request->file('avatar')->store('avatars','public');
            $user->avatar = $file;
        }
        $user->save();
        return view('welcome');
    }
    public function tutorial(){
        return view('users.tutorial');
    }
}
