

@extends('layouts.app')

@section('content')
<head>
<divnk rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ユーザ情報の変更') }}</div>
        <form method="post" action="{{ route('editComplete') }}">
 
        @CSRF
        <ul>
            <div>ユーザ情報の編集</div>
            <div></div>
            <div>編集したい項目をご記入の上送信ボタンを押してください</div>
            <div><span>*</span>は必須項目となります。</div>
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
            <div>名前<span>*</span>
            
                @if ($errors->has('name'))
                    <br>
                    <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div><input type="text" class="contact_form" name="name" placeholder="山田太郎"
                    value="{{ Auth::user()->name }}"></div>

                    
            <div>所属
                @if ($errors->has('affidivation'))
                    <br>
                    <p class="error-message">{{ $errors->first('affidivation') }}</p>
                @endif
            </div>
            <div><input type="text" class="contact_form" name="affidivation"
                    value="{{ Auth::user()->affidivation }}"></div>
            <div>電話番号
                @if ($errors->has('number'))
                    <br>
                    <p class="error-message">{{ $errors->first('number') }}</p>
                @endif
            </div>
            <div><input type="text" class="contact_form" name="number"
                    value="{{ Auth::user()->number }}"></div>
            <div>メールアドレス<span>*</span>
                @if ($errors->has('email'))
                    <br>
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div><input type="text" class="contact_form" name="email"
                    value="{{ Auth::user()->email }}"></div>
                 
            <div>住所
                @if ($errors->has('address'))
                    <br>
                    <p class="error-message">{{ $errors->first('address') }}</p>
                @endif
            </div>
            <div><input type="text" class="contact_form" name="address" 
                    value="{{Auth::user()->address }}"></div>
            <div>備考</div>
            <div>
                @if ($errors->has('remarks'))
                    <p class="error-message">{{ $errors->first('remarks') }}</p>
                @endif
                <textarea class="textarea" name="remarks" rows="6">{{ Auth::user()->remarks }}</textarea></div>
            <div>
                <button type="submit" class="button_send" value="">完了</button>
                <button type="button" onclick="history.back()" class="button_back" name="back" value="back">戻る</button>
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
