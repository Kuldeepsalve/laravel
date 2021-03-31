<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Student;

class ServiceController extends Controller
{
    public function add()
    {
        //mutators

        //eg before inserting mobile number we want to add +91 in front of it
        //code for this is present in model

        $student  = new Student;
        $student->name = "fikash";
        $student->email = "fikash@gmail.com";
        $student->address_info= "bhopal";
        $student->phone_number = "8888888888";

        if($student->save()){
            echo "<h1>student has been inserted</h1>";
        }
    }

    public function students()
    {
        //if we want to manipulate or change any before usign it we can do it with the help of accessor
        //code of accessor is in model class file

        //limit is for getting only 5 rows
         return Student::limit(5)->get();
    }
    public function service($locale)
    {
        App::setlocale($locale);
        return view("service");
    }
}
