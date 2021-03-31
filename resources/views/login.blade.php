<h1>Login form</h1>

<form action="user" method="post">
    @csrf
    <input type="text" name="user" placeholder="enter user name"><br>
    <input type="password" name="password" id="" placeholder="enter password"><br>
    <button type="submit">Login</button>
</form>
