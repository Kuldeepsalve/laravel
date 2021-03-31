<!--including header.blade.php-->
@include("partials.header")
<h1>Welcome to the Home page</h1>

<h3>{{ $name }}</h3>
<h3>{{ $email }}</h3>

@empty($message) <!--empty directive used to directly checck if the variable is empty of not -->
    <h2>Message variable is empty</h2>
@endempty


@if($age > 10)
    <h3>Age = {{ $age}}</h3>
@else
    <h3>Age is less than  10</h3>
@endif    

<!-- if a variable have a value off if a variable is declared or not can be chacked using isset directive-->
@isset($age)
<h4> Age have some value</h4>
@endisset

{{ 10 + 10 }}
<br>
{{ strtolower("HELLO KULDEPP SEE THIS IN LOWER") }}<!--WE CAN USE PHP FUNCTION IN BLADE PAGE INSIDE DOUBLE CURLY BRACES-->
<br>
{{ print_r($data)}} 
<!-- using for each loop -->
@foreach($data as $number)
<h3>Number = {{$number}}</h3>

@endforeach


<!-- json directives -->
<script>

//var arr = "<?php echo json_encode($data) ?>";

//  or we can use laravel json directive
var arr = @json($data);

console.log(arr);

</script>