<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("brokers")->insert([
            
            [
                "name"=> "broker 1",
                "mobile_no" => "12345656",
                "person_id"=>"2"
            ],
            [
                "name"=> "broker 2",
                "mobile_no"=>"9876876",
                "person_id"=>"1"
            ]
            
        ]);
    }
}
