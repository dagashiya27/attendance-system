

@extends('layouts.app')

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
                        <p >勤怠管理状況</p>
                    </a>

                    <a class="mpmenue" href="{{ route('edit.confirm') }}">
                        <p >ユーザ情報の変更</p>
                    </a>

                    <a class="mpmenue" href="{{ route('reserveLog') }}">
                        <p >会議室予約履歴</p>
                    </a>
                </div>

                       
                        
                        
                </div>
               
                

            </div>
        </div>
    </div>
</div>


@endsection
