<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class brancheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("branches")->insert([
            
            [
            "name"=> "Computer Science",
            "student_id" => "2",
            ],

            [
            "name"=> "Mechanical",
            "student_id" => "3",
            
            ],

            [
            "name"=> "CSE & IT",
            "student_id" => "4",
            ]
        ]);

        //DB::table('branches')->truncate();
    }
}
