<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Hello extends Controller
{
    //
protected $user;

public function __construct(){
    $this->user=[

"name"=>"subhajit",
"city"=>"hyd"
    ];
}
    public function helloworld(){
        //return view("home",["user"=>$this->user]);
        $user=$this->user;
        return view("home",compact('user'));
    } 


    public function index(){
        //return "index function from hello controller";
        $all=DB::table("employee")->get();
        //return $all;
        return view("hello",["all"=>$all]);
    }
}
