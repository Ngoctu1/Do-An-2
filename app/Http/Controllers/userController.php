<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class userController extends Controller
{
    function index(){
        
        $user = DB::table('users')->get();
        dd($user);

    }
    function detail($id){
        $user = DB::table('users')->where('id',$id)->first();
        return view ('users.detail', compact('user'));
    }
      
    function create(){}

    function deleta($id){
        return redirect() ->route('users.index');
    }
}
