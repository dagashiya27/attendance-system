

@extends('layouts.appAdmin')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('トップメニュー') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('管理者としてログインしました。') }}<br>
                        {{ __('機能テスト') }}
                    
                    </div>



                       
                        
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
