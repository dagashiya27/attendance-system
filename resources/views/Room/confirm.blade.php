

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
                
                    
                <form method="POST" action="{{ route('room.complete') }}">
                        @csrf

                        <label>会議室名</label>
                        {{ $inputs['name'] }}
                        <input name="name" value="{{ $inputs['name'] }}" type="hidden">

                        <label>開始時間</label>
                        {{ $inputs['start_time'] }}
                        <input name="start_time" value="{{ $inputs['start_time'] }}" type="hidden">
                        <label>終了時間</label>
                        {{ $inputs['finish_time'] }}
                        <input name="finish_time" value="{{ $inputs['finish_time'] }}" type="hidden">
                        <label>利用人数
                        </label>
                        {{ $inputs['people'] }}
                        <input name="people" value="{{ $inputs['people'] }}" type="hidden">
                        

                        


                        <label>備考</label>
                        {!! nl2br(e($inputs['body'])) !!}
                        <input name="remarks" value="{{ $inputs['remarks'] }}" type="hidden">

                        <button type="submit" name="action" value="back">入力内容修正</button>
                        <button type="submit" name="action" value="submit">予約する</button>
                        </form>




                    
            <div class="contact">
      

            </div>
        </div>
    </div>
</div>


@endsection
