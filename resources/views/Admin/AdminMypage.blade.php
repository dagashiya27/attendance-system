

@extends('layouts.appAdmin')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マイページ') }}</div>

                    <div class="card-body mp-bar">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    
                    </div>

                    <div class="MPmenueList">
                    <a class="mpmenue" href="{{ route('attendanceLog') }}">
                        <p>ユーザ問合せ</p>
                    </a>

                    <a class="mpmenue" href="{{ route('attendanceLog') }}">
                        <p>ユーザ登録</p>
                    </a>

                    <a class="mpmenue" href="{{ route('/Admin/AdminUser') }}">
                        <p >ユーザ一覧</p>
                    </a>
                   

                    <a class="mpmenue" href="{{ route('reserveLog') }}">
                        <p >会議室予約一覧</p>
                    </a>
                </div>

                       
                        
                        
                </div>
               
                

            </div>
        </div>
    </div>
</div>


@endsection
