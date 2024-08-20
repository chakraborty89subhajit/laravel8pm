<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    function session_get(Request $request){
         $info=$request->session()->get('name');
         return $info;

    }

    function session_set(Request $request){

        $request->session()->put('name','subhajit');
        return "session set successfully";
    }

    function session_remove(Request $request){
        $request->session()->forget('name');
        return "session removed successfully,need to call session_get to reset session value ";

    }

    function session_check(Request $request){
        if($request->session()->has('name')){
            return "welcome";

        }else{
              return "pls. login first";
        }

    }

    function UserLoginSubmit(Request $request){
        $request->validate([
         'username'=>'required',
         'email'=>'required',

        ]);

        $username=$request->input('username');
        $email=$request->input('email');
if($username=="xyz" && $email=="xyz@email.com"){
    $request->session()->put('name',$username);
    return redirect('UserWelcome');

}else{
    $request->session()->flash("error","pls. login with correct info. first");
    return redirect("login");

}

    }

    function welcomeUser(Request $request){
       // if($request->session()->has('name')){
            return view ('UserWelcome');
       // }else{
       //      $request->session()->flash("error","pls. login with correct info. first");
    //return redirect("login");
      //  }

   }
}
