

@extends('layouts.app')

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
                        {{ __('遅刻や欠勤に関しましては問合せよりご報告ください。') }}
                    
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    

                        <p id="sample"></p>

                    <script>
                        function zero( num) {
                        if (num < 10)  num = "0" + num   
                        return num;
                        }

                        function nowTime() {
                        const date = new Date(); //現在日時
                        
                        const h = zero( date.getHours() );   //時
                        const m = zero( date.getMinutes() ); //分
                        const s = zero( date.getSeconds() ); //秒

                        let weekday = new Array(7);
                        weekday[0] = "日";
                        weekday[1] = "月";
                        weekday[2] = "火";
                        weekday[3] = "水";
                        weekday[4] = "木";
                        weekday[5] = "金";
                        weekday[6] = "土";

                        let n = weekday[date.getDay()];

                        const now = `${h}:${m}:${s} (${n})`;

                        document.getElementById("sample").innerHTML = now;
                        
                        }
                        setInterval('nowTime()', 1000);
                    </script>
                        
                </div> 
                
                @if (session('my_status'))

                <p class="text-danger mt-3">
                         {{ session('my_status') }}
                        </p>
                        @endif
                        @if (session('error'))

                <p class="text-danger mt-3">
                    {{ session('error') }}
                 </p>
                @endif
                <form action="{{ route('attendance/attendance') }}" method="POST">
                                   
                                    @csrf
                                    @method('POST')     
                        <button type="submit" class="attendanceButton"  onclick="return confirm('出勤しますか？')">出勤</button>
                </form>

                <form action="{{ route('attendance/clockOut') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="attendanceButton"  onclick="return confirm('退勤しますか？')">退勤</button>        
                </form>
               



            </div>
        </div>
    </div>
</div>

  
@endsection
