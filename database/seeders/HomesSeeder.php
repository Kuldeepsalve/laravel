<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("homes")->insert([
            
            [
                "name"=> "Home 1",
                "address" => "address 1",
                "broker_id"=>"1"
            ],
            [
                "name"=> "Home 2",
                "address" => "address 2",
                "broker_id"=>"2"
            ]
           
            
        ]);
    }
}
