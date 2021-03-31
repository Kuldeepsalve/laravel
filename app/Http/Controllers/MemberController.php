<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

//to use query builder class we need to use it
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function testMethod()
    {
        //using updateOrInsert method

        // DB::table("students")->updateOrInsert(
        //     [
        //         //if this email exits in table than it will update rest of the data
        //         //otherwise it will create new data usiing this email id
        //         "email"=>"KuldeepSalve786@gmail.com"
        //     ],
        //     [
        //         "name"=>"sample Name",
        //         "phone_number"=>"88888888",
        //         "address_info"=>"mhow",
        //         "gender"=>"male"
        //     ]
        // );

        //deleting data
       // DB::table("students")->where("id",108)->delete();

        //using truncate method
        //rows 1-20 -> deleted all rrows -> start id of new data will be 11 -> delete()
        //rows 1-20 -> deleted all rrows -> start id of new data will be 1 -> truncate()

        // DB::table("students")->delete();
        //MemberController::insertData();

        DB::table("students")->truncate();
        MemberController::insertData();
        
        return redirect("list-students");

    }
    public function updateStudent()
    {
        DB::table("students")->where("id",103)->update([
                "name"=>"student 103 updated",
                "email"=>"student103updated@gmail.com"
        ]);

        return redirect("list-students");
    }
    public function insertData()
    {
    //    DB::table("students")->insert([
    //         "name"=> "student 100",
    //         "email"=> "student100@gmail.com",
    //         "phone_number"=>"10010001000",
    //         "address_info"=>"bhopal",
    //         "gender"=>"male"
    //     ]);

        //if we want to get id of the inserted students or data then use insertGetId
        // $inserted_id =  DB::table("students")->insertGetId([
        //     "name"=> "student 101",
        //     "email"=> "student101@gmail.com",
        //     "phone_number"=>"10010001000",
        //     "address_info"=>"indore",
        //     "gender"=>"female"
        // ]);

        //for inserting multiple students at the same time pass multidimensional array in insert
        DB::table("students")->insert(
        [    
            [
                    "name"=> "student 102",
                    "email"=> "student102@gmail.com",
                    "phone_number"=>"10010001000",
                    "address_info"=>"ujjain",
                    "gender"=>"female"
            ],
            [
                "name"=> "student 103",
                "email"=> "student103@gmail.com",
                "phone_number"=>"10010001000",
                "address_info"=>"dewas",
                "gender"=>"male"
            ],
            [
                "name"=> "student 104",
                "email"=> "student104@gmail.com",
                "phone_number"=>"10010001000",
                "address_info"=>"indore",
                "gender"=>"female"
            ]
        ]
        
        );

        return redirect("list-students");
        // echo "<h3>$inserted_id</h3>";
    }

    public function getStudents()
    {
        //$students = DB::table("students")->get();
        // echo "<pre>";
        // print_r($students);
        // foreach($students as $student)
        // {
        //     echo "NAME: " .$student->name."<br>";
        // }

        //now to get student on where condition  or searching
        //$students = DB::table("students")->where("id",8)->get();

        //now if we want to get data on basis of primary key then we can use find instead oof where
        //$students= DB::table("students")->find(8);

        //if we want to select onlu specific columns then we will use select
        // $students = DB::table("students")->select("name","email","phone_number as mobile")->get();//we can also provide alias eg phone_number

        //getting students whose name starts with a
        //$students = DB::table("students")->select("name","email","phone_number as mobile")->where("name","like","A%")->get();

        //select from student where cond1 and cond2;//using two where will generate and operator
        //$students = DB::table("students")->where("id",8)->where("email","kuldeep.salve@unthinkable.co")->first();

        //select from student where cond1 or cond2;//for this we need to use orwhere
        //$students = DB::table("students")->where("id",9)->orwhere("email","kuldeep.salve@unthinkable.co")->get();

        //selectt columns from table_name where cond1 and (cond2 or cond 3);
        // $students = DB::table("students")->where("id",8)->where(function($query){
        //     $query->where("email","kuldeep.salve@unthinkable.co")->orwhere("name","ttt");
        // })->first();

         //selectt columns from table_name where cond1 or (cond2 and cond 3);
        //  $students = DB::table("students")->where("id",9)->orwhere(function($query){
        //     $query->where("email","kuldeep.salve@unthinkable.co")->where("name","kuldeeep salve ");
        // })->get();

        //select columnns from table_name where column between 5 and 30;
       // $students = DB::table("students")->whereBetween("id",[5,30])->get();

       //select columns from table_name wnere column in (8,9,25,26)
       //$students = DB::table("students")->whereIn("id",[8,9,25,26])->get();


       //using inner join on project and members table
     //  $students= DB::table("members")->join("project","members.id","=","project.member_id")->get();

       // left join
        //$students = DB::table("members")->select("members.name as member_name","project.name as project_name","members.id as member_id","project.id as project_id","members.email")->leftJoin("project","members.id","=","project.member_id")->get();

       //right join
       $students = DB::table("members")->select("members.name as member_name","project.name as project_name","members.id as member_id","project.id as project_id","members.email")->rightJoin("project","members.id","=","project.member_id")->get();
        echo "<pre>";
        print_r($students);
    }

    public function addMember()
    {
        return view("member.add-member");
    }

    public function saveMember(Request $req)
    {
       print_r($req->all());

        //creating instance of model member
       $member= new Member();
       
       //assgning values to member keys
       $member->name = $req->name;
       $member->email = $req->email;
       $member->mobile_no =$req->mobile ;

       //saving values to database
      $member->save();
        
    //    Setting flash message
    //    2 ways to set flash message
    //    1.
       session()->flash("key","message");

      // 2. by usingg request instance
       $req->session()->flash("success","Member has been created");

    //    Redirection to add memberr after savingg member
    //    2 ways 

    //    1. 
       return redirect()->to("add-member");

      // 2.
       return redirect("add-member");
    }
}
