

@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('編集完了') }}</div>
                @method('PUT')
                @csrf
                <p id="spam">{{ __('ユーザ情報を変更しました。') }}</p>


                                     
                    
          
        </div>
        <div id="backButtonDiv"> <a class="" id="backButton2" href="{{ route('home') }}">
                    {{ __('トップへ戻る') }}
                </a>     </div>  
    </div>
</div>


@endsection
