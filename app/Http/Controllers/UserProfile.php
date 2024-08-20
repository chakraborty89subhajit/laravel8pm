<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserProfile extends Controller
{
    //getting all data from model=UserModel
    public function index(){
        return UserModel::all();

    }

    //getting data using id
    public function getDataById(){
        $result=UserModel::where('id',2)->get();
        return $result;
    }

     //getting data using id dynamically
    public function selectDataById($x){
        $result=UserModel::where('id',$x)->get();
        return $result;
    }

    //finding data by id
    public function findById(){
        $result=UserModel::find(2);
        return $result;
    }

    //finding data by id dynamically
    public function findDataById($x){
        $result=UserModel::find($x);
        return $result;
    }

    //sql aggregate functions
    public function agg(){
       // $result=UserModel::max('id');
       // $result=UserModel::min('id');
        // $result=UserModel::sum('id');
          //$result=UserModel::avg('id');
          $result=UserModel::count('id');

        return $result;
    } 

    //insert data
    public function insert(){
        $res= new UserModel;
        $res->name="gurucharan";
        $res->email="gurucharan@email.com";
        $res->country="india";

        $res->save();

        return UserModel::all();

}

public function update(){
    $res=UserModel::find(8);
    $res->name="ananta_mod";
    $res->email="ananta_mod@email.com";
    $res->country="india_mod";

    $res->save();

    return UserModel::where('id',8)->get();

}
//delete data
public function delete(){
    //delete data by id
    $res=UserModel::find(11);
    $res->delete();
    //delete multiple
    //UserModel::destroy(array(10,11));
    return UserModel::all();
}

}
