<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

//class UsersTableSeeder extends Seeder
//{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'name' => 'matsu',
            'affiliation' => '人事部',
            'number' => '09012345678',
            'remarks' => '休暇中',
            'email' => 'daga@gmail.com',
            'password' => bcrypt('mnbvcxz10'),
            'role' => 0,
           
             ]);

        DB::table('users')->insert([
            'name' => '人事部管理',
            'affiliation' => '人事部',
            'number' => '00000000000',
            'remarks' => '人事部管理者',
            'email' => 'manager01@gmail.com',
            'password' => bcrypt('manager01'),
            'role' => 1,
             ]);

        DB::table('users')->insert([
            'name' => '経理部管理',
            'affiliation' => '経理部',
            'number' => '00000000000',
            'remarks' => '経理部管理者',
            'email' => 'manager02@gmail.com',
            'password' => bcrypt('manager02'),
            'role' => 1,
                ]);
        DB::table('users')->insert([
            'name' => '営業部管理',
            'affiliation' => '営業部',
            'number' => '00000000000',
            'remarks' => '営業部管理者',
            'email' => 'manager03@gmail.com',
            'password' => bcrypt('manager03'),
            'role' => 1,
            ]);
        DB::table('users')->insert([
            'name' => '企画部管理',
            'affiliation' => '企画部',
            'number' => '00000000000',
            'remarks' => '企画部管理者',
            'email' => 'manager04@gmail.com',
            'password' => bcrypt('manager04'),
            'role' => 1,
            ]);
    }
}
