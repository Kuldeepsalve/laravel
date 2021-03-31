<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\userAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {//closure route because it is not calling any controller method
  //  return view('welcome');
    //echo "<h2>helloo Kuldeeep</h2>";
    
//})->name("welcome");//named routing

//using directives in blade.php
Route::get('/',function(){
    $name = "kuldeeep";
    $email = "blade@gmail.com";
    $message = "";
    $age = 9;
    $data =[1,2,3,4,5];
    return view("home",["name"=> $name, "email"=>$email,"message"=>$message,"age"=>$age,"data"=>$data]);
});


Route::get("/show-message",[Site::class,"showMessage"]);

//routing with views
//Route::view("/services","services");

//routing with parameter
//Route::get("/services",[Site::class,"ourServices"]);


//passing arguments creating placehollder for argument after /services/{id}
//Route::get("/services/{id}",[Site::class,"ourServices"]);

//optional parameter ie if we pass or not pass id after /services then also it should work usingg ?
Route::get("/services/{id?}",[Site::class,"ourServices"]);

//Redirect routing shifting from one locationn to another location
Route::get("products", function(){
echo "<h1>welcome to products page</h1>";
})->name("product");

Route::redirect("/services","products");//if we dont have services url then it willl be redirected to te products url


//if we want to save form data and redirect it to another pagge then we can use redirect rouuting here also
// Route::get("add-forms",function(){
//     echo "<h2>Add Form</h2>";
//     return redirect("products");
// });

//named routing
Route::get("add-forms",function(){
    echo "<h2>Add Form</h2>";
    return redirect()->route("product");
});


//Routing with Regular Expression
Route::get("works/{id}/{name}",function($id,$name){
    echo "ID:".$id."Name:".$name;
})->where(["id"=>"[0-9]+",
            "name"=>"[a-zA-Z]+"]);//applied validation on id parameter usinng regular expression onlu numbers can be passed now
 

//passing data 
Route::get("call", function(){
    
    // $data =["name"=> "kuldeep",
    //         "email"=> "kuldeepsalve786@gmail.com"
    //        ];
    // return view("call",$data);
    
    // or we can use as below
    
    // $data["name"]="kuldeep salve";
    // $data["email"]="kuldeep.salve@unthinkable.co";
    // return view("call",$data);

    // Or by using compact function


    $name="kuldeep salve";
    $email="kuldeep.salve@unthinkable.co";
    return view("call",compact("name","email"));

   
});

//passsing value using view route ie 3rd argument is for passsing data

Route::view("message","message",["name"=>"simple message", "email"=>"test@gmail.com"]);

// calling view using controller method

Route::get("test-message",[Site::class,"testMessage"]);

Route::get("about-us",[Site::class, "aboutUs"]);

Route::get("contact-us",[Site::class, "contactUs"]);

Route::get("blog",[Site::class,"Blog"]);

//creating and submitting form data
Route::get("/my-form",[Site::class, "myForm"]);
//Route::post("/my-form",[Site::class, "myForm"])->name('my-form');//for submitting form data

//we have created above two routs one for get and another for post now we can merge both in single using match method
//Route::match(["get","post"],"/my-form",[Site::class,"myForm"])->name('my-form');

// Form validation can ve done in following ways:
// 1. By using validate method
// 2. By making Request vallidation class
Route::post("/submit-data",[Site::class,"submitData"])->name('submit-data');//for submitting form data
// 3. By creating Manual validators.



//Database operations
Route::get("users",[Site::class, "selectData"]);

Route::get("create-user",[Site::class,"insertData"]);

Route::get("update-user",[Site::class, "updateData"]);

Route::get("delete-user",[Site::class, "deleteData"]);

//route for member controller
Route::get("add-member",[MemberController::class,"addMember"]);

//route for add memmbeer form

Route::post("save-member",[MemberController::class,"saveMember"])->name("member.save");

// listing all data
Route::get("list-students",[StudentController::class,"index"])->name("student.list");

//listing students in blade tamplate in table
Route::get("list-students",[StudentController::class,"listStudents"]);

//deleting row using action delete button on table
Route::get("delete-student/{id}",[StudentController::class, "deleteStudent"])->name("student.delete");

//updating data usingg action edit button on table
Route::get("edit-student/{id}",[StudentController::class, "editStudent"])->name("student.edit");
Route::post("update-student",[StudentController::class, "updateStudent"])->name("student.update");

//route for query builder
Route::get("db-students",[MemberController::class, "getStudents"]);

//insert student in member coontroller
Route::get("insert-student",[MemberController::class, "insertData"]);

//update student in member controller
Route::get("update-student",[MemberController::class, "updateStudent"]);

//Testmethod
Route::get("test-method",[MemberController::class,"testMethod"]);

//route for countryCheck middleware noAccess
// country- US , IN , AFG -> ALLOW
// COUNTRY- UK, AUS, ->DENY
Route::view("noAccess","noAccess");//if we pass ?country=us in url then this middleware will work


// GROUP MIDDLEWARE
// Route 1 => below route 1 can be accessed from any country code because it is not in the group apprestrict middleware
// Route 2 => this route is grouped iin apprestrict group middleware so it can only be accessed fromm in us afg
// route 3 =>   this route is grouped iin apprestrict group middleware so it can only be accessed fromm in us afg
Route::get("route-1",function(){
    echo "<h3>This is route 1 page</h3>";
});


Route::group(["middleware"=> ["apprestrict"]],function(){
    
    Route::get("route-2",function(){
        echo "<h3>This is route 2 page</h3>";
    });
    
    Route::get("route-3",function(){
        echo "<h3>This is route 3 page</h3>";
    });
});

//Applyting route middleware
Route::get("route-4",function(){
    echo "<h3>This is route 4 page</h3>";
})->middleware("apprestrict");


//consuming api posts
Route::get('get-posts',[postController::class,"getPost"]);


// service route for localizzation
Route::get("{locale}/service",[ServiceController::class, "service"]);

//Accessor
Route::get("all-students",[ServiceController::class,"students"]);

//mutators
// this are the opposite of accessro we were using accessor when printing data after retriving data from database
//on the other hand we use mutators while inserting data into the database

Route::get("create",[ServiceController::class,"add"]);

//route for login page
Route::get("login",function(){
    if(session()->has('user'))
        return view('profile');
    return view('login');
});

Route::post("user",[userAuth::class,"userLogin"]);

Route::get("profile",function(){
    if(!session()->has('user'))
    {
        return view('login');
    }
    return view('profile');
});

Route::get("logout",function(){

    if(session()->has('user'))
    {
        session()->pull('user');
        return redirect("login");
    }
});



//one to one relationship
Route::get("users",[StudentController::class,"listUsers"]);