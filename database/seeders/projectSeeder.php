<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table("project")->insert([
            "name"=> "project 40",
            "member_id" => "40",
            "status"=>"1"
        ]);
    }
}
