<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
            DB::table('users')->insert([
                'name' => 'matu',
                'affiliation' => '人事部',
                'number' => '0901234567',
                'remarks' => '休暇中',
                'email' => 'mana@gmail.com',
                'password' => bcrypt('mnbvcxz10'),
                'role' => 0,
               
                 ]);

           
                 
    }
}
