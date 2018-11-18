<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('staffID');
            $table->string('userID');
            $table->string('contact')->nullable();
            $table->string('gender')->nullable();
            $table->string('department')->nullable();
            $table->string('address')->nullable();
            $table->string('emergencyContact')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });

      DB::table('users')->insert([
          //Uncomment this and enter your details
        /*
        [
          'fname' => 'Your_firstname',
          'lname' => 'Your_Lastname',
          'staffID' => 'Your_StaffID',
          'userID' => 'Your_UserID',
          'email' => 'Your_Email',
          'password' => bcrypt('Your_Password'),
          'status' => 'Active'
        ],
        */

        //REMOVE FROM HERE
          [
            'fname' => 'Admin',
            'lname' => 'Admin',
            'staffID' => '12345',
            'userID' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'status' => 'Active'
          ],

          [
            'fname' => 'Manager1',
            'lname' => 'Manager1',
            'staffID' => '23456',
            'userID' => 'manager1',
            'email' => 'manager1@gmail.com',
            'password' => bcrypt('manager123'),
            'status' => 'Active'
          ],

          [
            'fname' => 'Manager2',
            'lname' => 'Manager2',
            'staffID' => '23457',
            'userID' => 'manager2',
            'email' => 'manager2@gmail.com',
            'password' => bcrypt('manager123'),
            'status' => 'Active'
          ],

          [
            'fname' => 'Staff1',
            'lname' => 'Staff1',
            'staffID' => '34567',
            'userID' => 'staff1',
            'email' => 'staff1@gmail.com',
            'password' => bcrypt('staff123'),
            'status' => 'Active'
          ],

          [
            'fname' => 'Staff2',
            'lname' => 'Staff2',
            'staffID' => '45678',
            'userID' => 'staff2',
            'email' => 'staff2@gmail.com',
            'password' => bcrypt('staff123'),
            'status' => 'Active'
          ],

          [
            'fname' => 'Staff3',
            'lname' => 'Staff3',
            'staffID' => '56789',
            'userID' => 'staff3',
            'email' => 'staff3@gmail.com',
            'password' => bcrypt('staff123'),
            'status' => 'Active'
          ]

          //TO HERE
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
