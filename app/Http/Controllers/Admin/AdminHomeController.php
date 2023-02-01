<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminHomeController extends Controller
{


      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


  

    public function AdminMypage()
    {
        return view('AdminMypage');
    }

    public function AdminRegist()
    {
        return view('AdminRegist');
    }

    
    public function attendanceLog()
    {
        return view('attendanceLog');
    }

    public function reserveLog()
    {
        return view('reserveLog');
    }

    public function userEdit(Request $request)
    {
        $user = Auth::user();
        return view('userEdit' ,compact('user'));
    }

    public function editConfirm(Request $request)
    {
        $inputs = $request->all();

        return view('editConfirm',
            [
            'inputs' => $inputs,
            ]);

    }

    public function editComplete(Request $request)
    {
        return view('editComplete');
    }

    public function reserve(Request $request)
    {
        return view('reserve');
    }
    //--------------問合せ---------------------------
    public function contact(Request $request){
        
     return view('contact.contact');
    }

    public function confirm(Request $request)
{
    // バリデーションルールを定義
    // 引っかかるとエラーを起こしてくれる
    $request->validate([
    'email' => 'required|email',
    'title' => 'required',
    'body' => 'required',
    ]);

    // フォームからの入力値を全て取得
    $inputs = $request->all();

    // 確認ページに表示
    // 入力値を引数に渡す
    return view('contact.confirm', [
    'inputs' => $inputs,
    ]);
}


    //--------------問合せメール---------------------------
public function send(Request $request)
{
    // バリデーション
    $request->validate([
    'email' => 'required|email',
    'title' => 'required',
    'body' => 'required'
  ]);

    // actionの値を取得
    $action = $request->input('action');

    // action以外のinputの値を取得
    $inputs = $request->except('action');

    //actionの値で分岐
    if($action !== 'submit'){

        // 戻るボタンの場合リダイレクト処理
        return redirect()
        ->route('contact')
        ->withInput($inputs);
        
    } else {
        // 送信ボタンの場合、送信処理

        // ユーザにメールを送信
        \Mail::to($inputs['email'])->send(new ContactsSendmail($inputs));
        // 自分にメールを送信
        \Mail::to('dagashiyasample@gmail.com')->send(new ContactsSendmail($inputs));

        // 二重送信対策のためトークンを再発行
        $request->session()->regenerateToken();

        // 送信完了ページのviewを表示
        return view('contact.complete');

    }
}
}
