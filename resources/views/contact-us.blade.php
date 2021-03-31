@extends("layouts.app")

@section("title","contact us page")
@push("style")
<style>
    h1{
        color:red;
    }

</style>

@endpush
@section("content")
<h1> Welcome to contact us page</h1>
<x-message type="success" message="we have some good message" :layout="$page"/>
@endsection
