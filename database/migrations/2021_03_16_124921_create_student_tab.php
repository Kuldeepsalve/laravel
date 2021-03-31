<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table - Students
        // Columns -
        //     id,
        //     name(120) - default('abc'),
        //     email(50) - nullable,
        //     phone_number(15) - nullable,
        //     address_info,
        //     gender[male, female, others],
        //     created_at(current timestamp),
        //     updated_at(current timestamp)

        //php artisan migrate:rollback;
        //php artisan migrate;

        //to perform both at the same time using single command
        //php artisan migrate:refresh;
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("name",120)->default('abc');
            $table->string("email",50)->nullable();
            $table->string("phone_number",15)->nullable();
            $table->text("address_info");
            $table->enum("gender",["male","female","others"]);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_tab');
    }
}
