

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
             
                    
                <form method="POST" action="{{ route('update') }}">
                    @method('PUT')
                        @csrf
                        <label>名前</label>
                        {{ $user['name'] }}
                        <input name="name" value="{{ $user['name'] }}" type="hidden">

                        <label>所属</label>
                        {{ $user['affiliation'] }}
                        <input name="affiliation" value="{{ $user['affiliation'] }}" type="hidden">

                       
                        <label>電話番号</label>
                        {{ $user['number'] }}
                        <input name="title" value="{{ $user['number'] }}" type="hidden">

                        <label>メールアドレス</label>
                        {{ $user['email'] }}
                        <input name="email" value="{{ $user['email'] }}" type="hidden">

                        <label>住所</label>
                        {{ $user['address'] }}
                        <input name="address" value="{{ $user['address'] }}" type="hidden">


                        <label>備考</label>
                        {!! nl2br(e($user['remarks'])) !!}
                        <input name="remarks" value="{{ $user['remarks'] }}" type="hidden">

                        <div>
                            <button type="button" onclick="history.back()" name="back editButton" value="back editButton">戻る</button>
                            <button type="submit" name="action editButton" value="submit editButton">変更</button>
                        </div>
                        </form>
                        <p>{{ session('flash_message') }}</p>




                    
            <div class="contact">
      

            </div>
        </div>
    </div>
</div>


@endsection
