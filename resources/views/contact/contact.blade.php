

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
                
                <p  id="p">問合せ先を選択の上送信ボタンを押してください</p>
                <p  id="p">送信頂いた件につきましては、送信先より折り返しご連絡を差し上げます。<br>
                    
                  
                </p>
                    <form method="POST" action="{{ route('contact.confirm') }}">
                    @csrf

                   

                    <label id="roomLabel">タイトル</label>
                    <input
                        id="contact_form" 
                        name="title"
                        value="{{ old('title') }}"
                        type="text">
                    @if ($errors->has('title'))
                        <p class="error-message">{{ $errors->first('title') }}</p>
                    @endif<br>

                    <label id="roomLabel">お問い合わせ内容</label><br>
                    <textarea name="remarks" id="contact_form" >{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif

                    <button type="submit" id="reserveButton3">入力内容確認</button>
                </form>




                    
            <div class="contact">
      

            </div>
        </div>
    </div>
</div>


@endsection
