<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class editController extends Controller
{
    //ユーザ情報の編集

  
   

    public function edit(Request $request){

        $user = Auth::user();

        $id = $request->get('id');
      
      
        return view('userEdit', compact('user'));
    }

    public function editConfirm(Request $request){


        $action = $request->post('action', 'back');
        $input = $request->except('action');
 
        if($request->input('back') == 'back'){
            return redirect()->action([editController::class, ' edit'])
            ->withInput();
        } 
        $name = htmlspecialchars($request->input('name'), ENT_QUOTES, "UTF-8");
        $affiliation = htmlspecialchars($request->input('affiliation'), ENT_QUOTES, "UTF-8");
        $number = htmlspecialchars($request->input('number'), ENT_QUOTES, "UTF-8");
        $email = htmlspecialchars($request->input('email'), ENT_QUOTES, "UTF-8");
        $address = htmlspecialchars($request->input('address'), ENT_QUOTES, "UTF-8");
        $remarks = htmlspecialchars($request->input('remarks'), ENT_QUOTES, "UTF-8");
        $user =
            [
                'name' => $name,
                'affiliation' => $affiliation,
                'number' => $number,
                'email' => $email,
                'address' => $address,
                'remarks' => $remarks,
            ];
        return view('editConfirm', compact('user'));
    }

    
    
    

    public function update(Request $request){

    $user = $request->post();
   
        $id = $request->input('id');
        $name = htmlspecialchars($request->input('name'), ENT_QUOTES, "UTF-8");
        $affiliation = htmlspecialchars($request->input('affiliation'), ENT_QUOTES, "UTF-8");
        $number = htmlspecialchars($request->input('number'), ENT_QUOTES, "UTF-8");
        $email = htmlspecialchars($request->input('email'), ENT_QUOTES, "UTF-8");
        $address = htmlspecialchars($request->input('address'), ENT_QUOTES, "UTF-8");
        $remarks = htmlspecialchars($request->input('remarks'), ENT_QUOTES, "UTF-8");
        $user = User::find($id);
        $user->name = $name;
        $user->affiliation = $affiliation;
        $user->number = $number;
        $user->email = $email;
        $user->address = $address;
        $user->remarks = $remarks;
        $user->save();

        return view('editComplete', compact('user'));
    }
}
