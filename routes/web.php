<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Hello;
use App\Http\Controllers\Form;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DB_Test;
use App\Http\Controllers\UserProfile;
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


// route for denied page
 Route::view('denied','denied'); 



//line 46 and line 47 will act as same
 //Route::view ('news','news')->middleware(\App\Http\Middleware\UserCheck::class); 
 //Route::view('news','news')->middleware('UserCheck');                       


Route::group(['middleware' => ['UserCheck']], function() {
    Route::view('news', 'news');
    Route::view('news1', 'news1');
});



Route::view('my_form','form');
Route::post('/formsubmit',[Form::class,"index"]);
Route::view('load_img','imguploader');
Route::post('/imgsubmit',[ImageController::class,"index"]);



//session related route
Route::get('session_get',[UserController::class,'session_get']);
Route::get('session_set',[UserController::class,'session_set']);
Route::get('session_forget',[UserController::class,'session_remove']);
//Route::get('session_check',[UserController::class,'session_check']);

//session login form
Route::view('login','login');
Route::view('UserWelcome','UserWelcome');
Route::post('session_check',[UserController::class,'session_check']);
Route::post('/UserLoginSubmit',[UserController::class,"UserLoginSubmit"]);
/*
Route::get('/UserWelcome',function(){
    if(!session()->has('name')){
        session()->flash('erroe','access denied');
        return redirect('login');
    }else{
        return view('UserWelcome');
    }
});
*/
Route::group(['middleware'=>['CheckSession']],function(){

Route::get("UserWelcome",[UserController::class,'WelcomeUser']);
});



//QueryBuilder project practice
Route::get('select',[DB_Test::class,'select']);
Route::get('selectById/{id}',[DB_Test::class,'selectById']);
Route::get('whereWithCondition',[DB_Test::class,'whereWithCondition']);
Route::get('isExists',[DB_Test::class,'isExists']);
Route::get('noOfRows',[DB_Test::class,'noOfRows']);
Route::get('agg',[DB_Test::class,'agg']);
Route::get('specificColumn',[DB_Test::class,'specificColumn']);
Route::get('mulSpecificColumn',[DB_Test::class,'mulspecificColumn']);
Route::get('rawSQL',[DB_Test::class,'rawSQL']);
Route::get('orderBy',[DB_Test::class,'orderBy']);
Route::get('insert',[DB_Test::class,'insert']);
Route::get('update',[DB_Test::class,'update']);
Route::get('deleteById',[DB_Test::class,'deleteById']);


//eliquent orm project
Route::get('get_data',[UserProfile::class,'index']);
Route::get('getDataById',[UserProfile::class,'getDataById']);
Route::get('selectDataById/{id}',[UserProfile::class,'selectDataById']);
Route::get('findById',[UserProfile::class,'findById']);
Route::get('findDataById/{id}',[UserProfile::class,'findDataById']);
Route::get('agg',[UserProfile::class,'agg']);
Route::get('insert',[UserProfile::class,'insert']);
Route::get('update',[UserProfile::class,'update']);
Route::get('delete',[UserProfile::class,'delete']);