<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("people")->insert([
            
            [
            "name"=> "person 1",
            "address" => "location 1",
            ],

            [
                "name"=> "person 2",
                "address" => "location 2",
            ],

            [
                "name"=> "person 3",
                "address" => "location 3",
            ]
                
        ]);
    }
}
