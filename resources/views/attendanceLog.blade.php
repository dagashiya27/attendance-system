
@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="board">
            <div class="panel panel-default">
                <div class="panel-heading">勤怠管理状況</div>

                <div class="panel-body" id="panel">
                    <table class="room" >
                        <tr>
                            
                            <th class="">個別ID</th>
                            <th class="">出勤時間</th>
                            <th class="">退勤時間</th>
                            <th class="">備考</th>
                          
                        </tr>
                   @foreach($user as $detail)
                 
                   
                        <tr>
                         
                            <td>{{$detail->user_id}}</td>
                            <td>{{$detail->attendance}}</td>
                            <td>{{$detail->clock_out}}</td>
                            <td>{!! nl2br(htmlspecialchars($detail->remarks)) !!}</td>
                           
                           
                        </tr>



                     
                        @endforeach
                     


                        
                  
                    </table>
                 
                <div><button type="button" id="reserveButton" onclick="history.back()" class="button_back" name="back" value="back">戻る</button></div>
            </div>
        </div>
    </div>
</div>
@endsection