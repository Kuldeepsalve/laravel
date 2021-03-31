<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Branch;
use App\Models\course;



class StudentController extends Controller
{
    public function updateStudent(Request $req)
    {
        //echo "<pre>";
       // print_r($req->all());

       $student_obj = Student::find($req->id);

       $student_obj->name = $req->name;
       $student_obj->email = $req->email;
       $student_obj->phone_number = $req->phone_number;
       $student_obj->gender = $req->gender;

       $student_obj->save();
       session()->flash("success","student has been updated");
       return redirect('list-students');


    }
    public function editStudent($id)
    {
        $student_data = Student::find($id);
        return view("edit-student",["student"=>$student_data]);
    }
    public function deleteStudent($id)
    {
       //echo  $id; 
       $student =Student::find($id);
       $student->delete();

      // return redirect("list-students");
        session()->flash("success","Student have id =$id has been deleted successfully");
      return redirect('list-students');
    }
    public function listStudents(){
        $all_students = Student::all();
        return view("list-students",["students" => $all_students]);
    }

    public function index(){
        //llist data code
        
        //readingg all data
        //$students = Student::all();
        //$students = Student::get();
        
        //if we want to get data on the basis of id
        //$students = Student::where("id",4)->get();

        //to get onnly one row wit the help of primary key we will use firstt method
        //$students = Student::where("id",4)->first();
        //$students = Student::where("email","qleuschke@example.org")->first();
        //$students = Student::firstWhere("email","qleuschke@example.org");

        //getting data for multiple primary key eg for 4,6,8
        $students = Student::find([4,6,8]);
        
        //to read row on behalf of pk we use find
        //$students = Student::find(4);

        echo "<pre>";
        print_r($students);

        // foreach($students as $student){
        //     echo $student->name." ".$student->email."<br>";
        // }

    }

    //one to one relation
    public function listUsers()
    {
        //getting branch of id 2 student
        //here branch is the method as a property here of model student.php
        //it will return the data of with branch of student id 2
        //return Student::find(2)->branch;


        //for inverse relation
        //it will return the student having branch id 1
        //return Branch::find(1)->student;

        //one to many
        //return Student::find(3)->courses;

        //one to many inverse
        return json_encode(course::find(5)->student);


        //has ONe through relationship
        // Person -> broker -> Home

    }
}
