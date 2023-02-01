<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;


class AdminUserController extends Controller
{
    public function AdminUser(Request $request){
        
        $info = Auth::user();
        $id = $request->get('id');
        $user = User::all();

        return view('/Admin/AdminUser', compact('user','info'));
    }


}