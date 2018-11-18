<?php

use Illuminate\Database\Seeder;
use App\PendingUser;

class PendingUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PendingUser::create([
        'fname' => 'Pending1',
        'lname'=> 'Pending1',
        'staffID' => '98765',
        'userID' => 'pending1',
        'status' => 'Pending',
        'remarks' => '',
        'email' => 'pending1@mail.com',
        'password' => bcrypt('pending123')
      ]);

      PendingUser::create([
        'fname' => 'Pending2',
        'lname'=> 'Pending2',
        'staffID' => '87654',
        'userID' => 'pending2',
        'status' => 'Pending',
        'remarks' => '',
        'email' => 'pending2@mail.com',
        'password' => bcrypt('pending123')
      ]);

      PendingUser::create([
        'fname' => 'Pending3',
        'lname'=> 'Pending3',
        'staffID' => '76543',
        'userID' => 'pending3',
        'status' => 'Pending',
        'remarks' => '',
        'email' => 'pending3@mail.com',
        'password' => bcrypt('pending123')
      ]);

    }
}
