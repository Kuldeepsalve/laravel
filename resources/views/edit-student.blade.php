<!DOCTYPE html>
<html lang="en">
<head>
  <title>List students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

@if(session()->has("success"))
    <div class="alert alert-success">
    {{session("success")}}
    </div>
@endif
  <h2> Edit Student</h2>
        
<form action="{{route('student.update')}}" method="post">
@csrf
<input type="hidden" name="id" value="{{$student->id}}">
<p>Name:<input type="text" name="name" placeholder="Enter Name" value="{{$student->name}}"></p>
<p>Email:<input type="email" name="email" placeholder="Enter Email" value="{{$student->email}}"></p>
<p>Phone Number:<input type="text" name="phone_number" placeholder="Enter Phone Number" value="{{$student->phone_number}}"></p>
<p>Gender: <select name="gender" id="">
                <option value="male" @if($student->gender == "male") selected @endif>male</option>
                <option value="female" @if($student->gender == "female") selected @endif>female</option>
                <option value="others" @if($student->gender == "others") selected @endif>others</option>
            </select> </p>
<p>
    <button type="submit">Submit</button>
</p>
</form>
</div>

</body>
</html>
