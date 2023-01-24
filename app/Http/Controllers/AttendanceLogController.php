<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;

class AttendanceLogController extends Controller
{
    public function AttendanceLog(Request $request){
        
        $info = Auth::user();
        $id = $request->get('id');
        $user = Attendance::all();

        return view('AttendanceLog', compact('user','info'));
    }


}