

@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('予約完了') }}</div>
                
                <p id="spam">{{ __('会議室の予約が完了しました。') }}</p>


                <a class="" id="reserveButton" href="{{ route('home') }}">
                    {{ __('トップへ戻る') }}
                </a>                    
                    
          
        </div>
    </div>
</div>


@endsection
