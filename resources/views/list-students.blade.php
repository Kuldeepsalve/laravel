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
  <h2>Students list</h2>
        
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Gender</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone_number}}</td>
            <td>{{ucfirst($student->gender)}}</td>
            <td>
                <a href="{{route('student.delete',$student->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{route('student.edit',$student->id)}}" class="btn btn-info">Edit</a>
            </td>
        </tr>

     @endforeach
     
     
    </tbody>
  </table>
</div>

</body>
</html>
