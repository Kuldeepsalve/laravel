<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //seeders are used to insert dummy data inside our database one roww at a time
    //if we want to insert 100s and 1000s of rows at a same time then we will use facker library and factory concept
    // facker library is a librarry that generates fake data
    public function run()

    {    //if we want to seed using databaseseeder.php file -
         //php artisan db:seed

         //if we dont want to call databaseSeeder.php file we can directly call our seeder file using 
         //php artisan db:seed --class=CreateStudentSeeder

        //  DB::table("student_tab")->insert([
        //     "name"=> "vijay kumar",
        //     "email" => "vijay@gmail.com",
        //     "phone_number" => "454121223",
        //     "address_info"=>"jawahar nagar indore",
        //     "gender"=>"male"
        // ]);

         //using faker library first  we need to create faker instance
         $faker = \Faker\Factory::create();
         
    //here we have generated only one row of data using faker but if we want to generate bulk rows of data at the same time then we will use factory concept
        DB::table("students")->insert([
            "name"=> $faker->name(),
            "email" => $faker->safeEmail,
            "phone_number" => $faker->phoneNumber,
            "address_info"=>$faker->address,
            "gender"=>$faker->randomElement(['male','female','others'])
        ]);
    }
}
