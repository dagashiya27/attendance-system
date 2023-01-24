

@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('お問合せ') }}</div>
                
                <p>問合せ内容を確認の上送信ボタンを押してください</p>
             
                    
                <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <label>メールアドレス</label>
                        {{ $inputs['email'] }}
                        <input name="email" value="{{ $inputs['email'] }}" type="hidden">

                        <label>タイトル</label>
                        {{ $inputs['title'] }}
                        <input name="title" value="{{ $inputs['title'] }}" type="hidden">


                        <label>お問い合わせ内容</label>
                        {!! nl2br(e($inputs['body'])) !!}
                        <input name="body" value="{{ $inputs['body'] }}" type="hidden">

                        <button type="submit" name="action" value="back">入力内容修正</button>
                        <button type="submit" name="action" value="submit">送信する</button>
                        </form>




                    
            <div class="contact">
      

            </div>
        </div>
    </div>
</div>


@endsection
