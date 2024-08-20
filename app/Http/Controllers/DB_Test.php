<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DB_Test extends Controller
{
    //select all data from table
    public function select(){
        //return all data from table
        $result=DB::table('users')->get();

        echo"<pre>";
        print_r($result);

    }

    //select data from table using id
    public function selectById($x){
        $result=DB::table('users')->where('id',$x)->get();

return $result;

       // echo"<pre>";
        //print_r($result);
    }
    

    //select data from table with a condition in where clause
    public function whereWithCondition(){
        $result=DB::table('users')->where('id','!=','1')->get();
        return $result;
    }

   //check if the data is present or not in the table
    public function isExists(){
        $result=DB::table('users')->where('id',2)->exists();
        return $result;
    }

   //count the no. of rows in the table
    public function noOfRows(){
        $result=DB::table('users')->count();
        return $result;
    }

    //aggregate functions

    public function agg(){
        //$result=DB::table('users')->MAX('id');
        $result=DB::table('users')->MIN('id');
       // $result=DB::table('users')->SUM('id');
       // $result=DB::table('users')->AVG('id');
        return $result;
}

//select pecific column from table
public function specificColumn(){
    //$result=DB::table("users")->select("id")->get();
   // $result=DB::table("users")->select("name")->get();
   // $result=DB::table("users")->select("email")->get();
    $result=DB::table("users")->select("country")->get();



    return $result;
}

//select multiple specific column from table
public function mulSpecificColumn(){
    $result=DB::table("users")->select(array("id","name"))->get();
    return $result;
}


//running raw sql
public function rawSQL(){
   // $result=DB::select(DB::raw('select * from users'));
    $result=DB::select('select * from users');
    return $result;
}

//order by
public function orderBy(){
   // $result=DB::table('users')->orderBy('id','desc')->get();
   $result=DB::table('users')->orderby('id','asc')->get();
    return $result;
}

//inserting data
public function insert(){

    //insert single data
    $result=DB::table("users")->insert(array('name'=>'rohan','email'=>
        'rohan@email.com','country'=>'india'));
//insert multiple data
  //  $result=DB::table('users')->insert([['name'=>'mohit','email'=>'mohit@email.com','country'=>'india'],['name'=>//'pritam','email'=>'pritam@email.com','country'=>'india']]);
    return "data insert successfully";
}

//update data
public function update(){
    $result=DB::table('users')->where('id',4)->update(array('name'=>'jatin_mod','email'=>'jatin_mod@email.com','country'=>'india_mod'));
    return "data updated successfully";
}

//deleting data using id
public function deleteById(){
  //  $result= DB::table("users")->where('id',7)->delete();
    return 'record deleted successfully';
}
}
