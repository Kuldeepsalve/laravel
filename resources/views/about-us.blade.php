@extends("layouts.app")

@section("title","About us page")

@push("style")
<style>
    h1{
        color:blue;
    }

</style>

@endpush

@section("content")
<h1> Welcome to about us page</h1>
<x-message type="error" message="we have some error message" :layout="$page"/>
<x-alert>
    <x-slot name="title">
        alert sample title 1
    </x-slot>
we have something inner content of alert component
<h2>inner h2 tag</h2>
</x-alert>

<x-messagebox name="sample messagebox">
this is sample content inside messagebox component
</x-messagebox>
@endsection

