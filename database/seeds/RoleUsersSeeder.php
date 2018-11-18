<?php

use Illuminate\Database\Seeder;
use App\RoleUser;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class RoleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Uncomment this
        /*
        if (RoleUser::where('user_id', '=', '1')->first() === null) {
            RoleUser::create([
                'user_id'        => '1', //id for the user in users table
                'role_id'        => '1', //role level. 1: admin; 2: manager; 3: staff;
            ]);
        }
        */

        //Comment from here

        //admin
        if (RoleUser::where('user_id', '=', '1')->first() === null) {
            RoleUser::create([
                'user_id'        => '1',
                'role_id'        => '1',
            ]);
        }

        //manager
        if (RoleUser::where('user_id', '=', '2')->first() === null) {
            RoleUser::create([
                'user_id'        => '2',
                'role_id'        => '2',
            ]);
        }


        if (RoleUser::where('user_id', '=', '3')->first() === null) {
            RoleUser::create([
                'user_id'        => '3',
                'role_id'        => '2',
            ]);
        }

        //staff
        if (RoleUser::where('user_id', '=', '4')->first() === null) {
            RoleUser::create([
                'user_id'        => '4',
                'role_id'        => '3',
            ]);
        }

        if (RoleUser::where('user_id', '=', '5')->first() === null) {
            RoleUser::create([
                'user_id'        => '5',
                'role_id'        => '3',
            ]);
        }

        if (RoleUser::where('user_id', '=', '6')->first() === null) {
            RoleUser::create([
                'user_id'        => '6',
                'role_id'        => '3',
            ]);
        }

        //To here
    }
}
