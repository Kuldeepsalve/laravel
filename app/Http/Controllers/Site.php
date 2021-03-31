<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\DB;

class Site extends Controller
{
    //Database operation usign DB facades
    public function selectData()
    {
        $userid = 2;
        //select all rows
        $users = DB::select("select * from tbl_users");

        //$users = DB::select("select * from tbl_users where id = ?",[$userid]);

        //using named binding parameter
        //$users = DB::select("select * from tbl_users where id = :id",["id" =>$userid]);
       
       //printing all of the values using foreach
       foreach($users as $index => $user)
       {
        echo "Name:".$user->name."<br/>";
       }
        // echo "<pre>";
        // print_r($users);
    }

    public function insertData()
    {
        $name = "Dhananjay";
        $email = "Dhananjay@gmail.com";
        $phone_no = "3433311332";
     // $row =   DB::insert("insert into tbl_users (name, email, phone_no) values ('pradeep', 'pradeep@gmail.com', '5443433323')");
     $row =   DB::insert("insert into tbl_users (name, email, phone_no) values (?,?,?)",[$name,$email,$phone_no]); 
     echo $row; // if it returns 1 means successfully inserted
    }

    public function updateData()
    {
        $name = "update 2";
        $email = "update2@gmail.com";
        $phone_no ="5342234341";
        //$row = DB::update("update tbl_users set name  = ?, email = ?, phone_no = ? where id = 2",[$name,$email,$phone_no]);
        
        //named binding
        $row = DB::update("update tbl_users set name  = :name, email = :email, phone_no = :phone where id = 3",["name"=> $name,"email"=>$email,"phone"=>$phone_no]);
        echo $row;
    }

    public function deleteData()
    {
        $userId = 4;

        DB::delete("delete from tbl_users where id = :userId",["userId"=>$userId]);
    }
    public function showMessage(){
        //echo "<h1>Hello Kuldeep Welcome to Laravel</h1>";
        return view("show-message");
        }

    public function ourServices($services_id=""){
        echo "<h1>ID:".$services_id."</h1>";
        return view("services");
    }

    //calling view file usingg controller 99% used methtod for calling view
    public function testMessage()
    {
        //return view("test-message");
        $name="kuldeep salve";
    $email="kuldeep.salve@unthinkable.co";
    return view("test-message",compact("name","email"));

    }

    public function aboutUs()
    {
        return view("about-us",[
            "page"=> "about us"
        ]);
    }

    public function contactUs()
    {
        return view("contact-us",[
            "page"=>"contact us"
        ]);
    }

    public function Blog()
    {
        return view("blog",["content"=>"hello this is blog content"]);
    }

    //form creating and submitting

//1. using validate method
    public function myForm()
    //public function myForm(Request $req)
    {
        // if($req->isMethod("post"))
        // {   
        //     //validating form elements using validate function
        //     $req->validate([
        //         "name" => "required|min:3|max:10",
        //         "email"=> "required|unique:students,email",//it will check in students table email column that email is unique or not
        //         "mobile"=>"required|digits_between:9,11"
        //     ]);

            
        //     //print_r($req->all()); it will print whole array
            
        //     //echo $req->input("name"); for taking single value

        //     //echo $req->email;// another way for takingg single value
           
            

        // }
       
       // print_r($req->all());
        return view("my-form");
    }
//2. using Request class this function will  be called for post data so enable post route for myform
    // public function submitData(StoreStudentData $requ){
    //     $requ->validated();
    //     print_r($requ->all());
    // }

//3. using mannual custom validation Facade
    public function submitData(Request $req){
        $validate = Validator::make($req->all(),[
            "name"=>"required|min:5|max:10",
            "email"=>"required",
            "mobile"=>"required"

        ])->validate();//->validate() is a chaining method used insted of below if else

        // if($validate->fails()){ if we don't want tto use this if else for checking if validations are success or not we will use chainning method above validate it wwill redirect errrors from which the request is coming
        //     return redirect("my-form")->withErrors($validate)->withInput();
        // }
        // else
        //  echo "form submitted successfully";


        print_r($req->all());
    }
}