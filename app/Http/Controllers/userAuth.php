<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userAuth extends Controller
{
   public function userLogin(Request $req)
   {
         $data = $req->input();

        $req->session()->put("user",$data['user']);

        //echo session("user");
        return redirect('profile');
   }
}
