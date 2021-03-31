<h1>Add Member</h1>

@if(session()->has("success"))

    <p>{{ session("success") }}</p>
@endif


<form action="{{route('member.save')}}" method="post">
@csrf
    <p>
        Name:
        <input type="text" name="name" placeholder="Enter Name">
    </p>
    <p>
        Email:
        <input type="email" name="email" placeholder="Enter email">
    </p>
    <p>
        Mobile:
        <input type="text" name="mobile" placeholder="Enter mobile">
    </p>    
    <p>
        <button type="submit">Submit</button>
    </p>
</form>