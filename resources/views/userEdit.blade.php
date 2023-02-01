

@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ユーザ情報の変更') }}</div>
        <form method="post" action="{{ route('editPass') }}">
 
        @CSRF
        <ul>
            <div id="p">ユーザ情報の編集</div>
            
            <div id="p">編集したい項目をご記入の上送信ボタンを押してください</div>
            
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <label id="roomLabel">名前</label><br>
            <div>
                @if ($errors->has('name'))
                    <br>
                    <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div><input type="text" id="contact_form" name="name" 
                    value="{{ Auth::user()->name }}"></div>

                    
                <label id="roomLabel">所属</label><br>
                @if ($errors->has('affiliation'))
                    <br>
                    <p class="error-message">{{ $errors->first('affiliation') }}</p>
                @endif
          
            <div><input type="text" id="contact_form" name="affiliation"
                    value="{{ Auth::user()->affiliation }}"></div>
                    <label id="roomLabel">電話番号</label><br>
                @if ($errors->has('number'))
                    <p class="error-message">{{ $errors->first('number') }}</p>
                @endif
           
            <div><input type="text" id="contact_form" name="number"
                    value="{{ Auth::user()->number }}"></div>
            <label id="roomLabel">メールアドレス</label><br>
                @if ($errors->has('email'))
                    <br>
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            
            <div><input type="text" id="contact_form" name="email"
                    value="{{ Auth::user()->email }}"></div>
                 
                <label id="roomLabel">住所</label><br>
                @if ($errors->has('address'))
                    
                    <p class="error-message">{{ $errors->first('address') }}</p>
                @endif
       
            <div><input type="text" id="contact_form" name="address" 
                    value="{{Auth::user()->address }}"></div>
                    <label id="roomLabel">備考</label><br>
            <div>
                @if ($errors->has('remarks'))
                    <p class="error-message">{{ $errors->first('remarks') }}</p>
                @endif
                <textarea class="textarea" name="remarks"id="contact_form" rows="10">{{ Auth::user()->remarks }}</textarea>
            
            <div>
                <button id="editButton" type="submit" class="button_send" value="">完了</button>
                <button id="editButton" type="button" onclick="history.back()" class="button_back" name="back" value="back">戻る</button>
            </div>
            </form>
     
        </ul>
    </div>


</body>
</html>



                    
            <div class="contact">
      

            </div>
        </div>
    </div>
</div>


@endsection
