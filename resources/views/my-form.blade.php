<h1>Welcome to form </h1>
<!-- all the errors are stored in default error bag at server site  -->

@if($errors->any())

    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach

@endif

<!-- The name field is required.
The email field is required.
The mobile field is required.
above code will show this 3 lines of error if all thhe 3 fields are empty -->


<form action="{{route('submit-data')}}" method="post">
<!-- @csrf -->
{{csrf_field()}}
<p>
Name: <input type="text" name="name" value="{{old('name')}}" placeholder="Enter Name">
<br>
@error("name")
    {{$message}}
@enderror
</p>
<p>
Email: <input type="email" name="email" value="{{old('email')}}" placeholder="Enter email">
<br>
@error("email")
    {{$message}}
@enderror
</p>
<p>
Mobile: <input type="text" name="mobile" value="{{old('mobile')}}" placeholder="Enter mobile">
<br>
@error("mobile")
    {{$message}}
@enderror
</p>
<p>
<button type="submit">submit</button>
</p>
</form>