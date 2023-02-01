<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Admin;

use Illuminate\Support\Facades\Auth;


class AdminDeleteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

 public function delete(Request $request){
    $id = $request->get('id');
    User::find($id)->delete();

    $info = Auth::user();
    $id = $request->get('id');
    $user = User::all();
    return view('admin/AdminUser', compact('user','info'));
}


public function ReserveDelete(Request $request){
    $id = $request->get('id');
    Reservation::find($id)->delete();

    $info = Auth::user();
    $id = $request->get('id');
    $user = Reservation::all();
    return  view('ReserveLog', compact('user','info'));
}
}
