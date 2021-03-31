<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class postController extends Controller
{
    public function getPost()
    {
        $posts = HTTP::get("https://jsonplaceholder.typicode.com/posts");

        //return json_decode($posts);
        return view("list-posts",["posts"=> json_decode($posts)]);
    }
}
