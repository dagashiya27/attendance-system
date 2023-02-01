

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

                        {{ __('おはようございます。') }}<br>
                        {{ __('') }}
                    
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    

                     
                        
                        <div class="AMPmenueList">
                    <a class="Ampmenue" href="{{ route('attendanceLog') }}">
                        <p>ユーザ問合せ</p>
                    </a>

                    <a class="Ampmenue" href="{{url('/admin/register') }}">
                        <p>ユーザ登録</p>
                    </a>

                    <a class="Ampmenue" href="{{ route('/Admin/AdminUser') }}">
                        <p >ユーザ一覧</p>
                    </a>
                   

                    <a class="Ampmenue" href="{{ route('reserveLog') }}">
                        <p >会議室予約一覧</p>
                    </a>
                </div>
	

	


                </div> 
                
    





            </div>
        </div>
    </div>
</div>

  
@endsection
