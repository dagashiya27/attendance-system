<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ReserveationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
            DB::table('Reservations')->insert([
                
                'r_user_id' => '1',
                'user_id' => '1',
                'room_name' => '部屋1',
                'start_time' => '2023-01-31 12:00:00',
                'finish_time' => '2023-01-31 13:00:00',
                'people' => '10',
                'remarks' => '休暇中',
                
               
                 ]);

           
                 
    }
}
