<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;

class ReserveLogController extends Controller
{
    public function reserveLog(Request $request){
        
        $info = Auth::user();
        $id = $request->get('id');
        $user = Reservation::all();

        return view('ReserveLog', compact('user','info'));
    }


}