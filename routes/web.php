<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hello;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return view('hello');
});


Route::get('/home',function(){
    return view('home');
});

/*Route::get('/hello','Hello',["name"=>"subhajit",
                             "city"=>"hyd"]);*/

//-/test is the url parameter,Hello is the controller class name,helloworld is the name of the method present in th e Hello class
                             
 Route::get("/test",[Hello::class,"helloworld"]);

 Route::get("/index",[Hello::class,"index"]);                            
