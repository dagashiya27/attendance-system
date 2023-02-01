
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">会議室予約履歴</div>

                <div class="panel-body">
                    <table class="room">
                        <tr>
                            <th class="">個人ID</th>
                            <th class="">部屋名</th>
                            <th class="">開始日時</th>
                            <th class="">終了日時</th>
                            <th class="">利用人数</th>
                            <th class="">備考</th>
                            <th class="">削除</th>
                        </tr>
                  
                        <tr>
                        @foreach($user as $detail)
                 
                   
                 <tr>
                  
                     <td>{{$detail->user_id}}</td>
                     <td>{{$detail->room_name}}</td>
                     <td>{{$detail->start_time}}</td>
                     <td>{{$detail->finish_time}}</td>
                     <td>{{$detail->people}}</td>

                     <td>{!! nl2br(htmlspecialchars($detail->remarks)) !!}</td>
                     <td><a href="/delete?id={{$detail->id}}"><button type="submit" id="userButton"class="db_link" onclick="return confirm('本当に削除しますか？')">削除</button></a></td>

                        </tr>
                  
                        @endforeach
                    </table>
                   
                </div>
               
                <div><button type="button" id="reserveButton"onclick="history.back()" class="button_back" name="back" value="back">戻る</button></div>
            </div>
        </div>
    </div>
</div>
@endsection