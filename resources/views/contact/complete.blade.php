

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
                
                <p id="spam">{{ __('お問合せの送信が完了しました。') }}</p>

                <div id="backButtonDiv"> <a class="" id="backButton" href="{{ route('home') }}">
                    {{ __('トップへ戻る') }}
                </a>     </div>           
                    
          
        </div>
    </div>
</div>


@endsection
