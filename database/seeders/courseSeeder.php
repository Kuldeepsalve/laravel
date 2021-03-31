<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("courses")->insert([
            
            [
                "student_id" => "3",
                "name"=> "wordpress",
                "amount"=>"100"
            ],

            [
                "student_id" => "3",
                "name"=> "PHP",
                "amount"=>"120"
            
            ],

            [
                "student_id" => "5",
                "name"=> "Laravel 8",
                "amount"=>"500"
            ],
            [
                "student_id" => "1",
                "name"=> "Internet",
                "amount"=>"650"
            ],
            [
                "student_id" => "1",
                "name"=> "Node js",
                "amount"=>"120"
            ],
        ]);

    }
}
