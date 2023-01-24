<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //
    public function attendance()
    {
        $user = Auth::user();
      
              /**
         * 打刻は1日一回までにしたい 
         * DB
         */
        $oldAttendance = Attendance::where('user_id', $user->id)->latest()->first();
        if ($oldAttendance) {
            $oldAttendancelog = new Carbon($oldAttendance->attendance);
            $oldAttendanceDay = $oldAttendancelog->startOfDay();
        }


        $newAttendanceDay = Carbon::today();

    /**
     * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
     */
        if (($oldAttendanceDay == $newAttendanceDay) && (empty($oldAttendance->clock_out))){
        return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $timestamp = Attendance::create([

            'user_id' => $user->id,
            'user_affiliation' => $user->affiliation,
            'user_name' => $user->name,
            'attendance' => Carbon::now(),
        ]);

        return redirect()->back()->with('my_status', '出勤打刻が完了しました');
        }
            
    
    

        //退勤打刻システム
        public function clockOut()
        {
            $user = Auth::user();
            $timestamp = Attendance::where('user_id', $user->id)->latest()->first();

            if( !empty($timestamp->clock_out)) {
                return redirect()->back()->with('error', '既に退勤の打刻がされているか、本日の出勤打刻されていません');
            }
            $timestamp->update([
                'clock_out' => Carbon::now()
            ]);

            return redirect()->back()->with('my_status', '退勤打刻が完了しました');
        }
        }
