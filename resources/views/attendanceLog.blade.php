
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">勤怠管理状況</div>

                <div class="panel-body">
                    <table class="room">
                        <tr>
                            
                            <th class="name">個別ID</th>
                            <th class="price">出勤時間</th>
                            <th class="name">退勤時間</th>
                            <th class="price">備考</th>
                            <th class="command">編集</th>
                        </tr>
                   @foreach($user as $detail)
                 
                   
                        <tr>
                         
                            <td>{{$detail->user_id}}</td>
                            <td>{{$detail->attendance}}</td>
                            <td>{{$detail->clock_out}}</td>
                            <td>{!! nl2br(htmlspecialchars($detail->remarks)) !!}</td>
                            <td><a href="/edit?id={{$detail->id}}"><button type="submit" class="db_link">編集</button></a></td>
                            <td><a href="/delete?id={{$detail->id}}"><button type="submit" class="db_link" onclick="return confirm('本当に削除しますか？')">削除</button></a></td>
                        </tr>



                     
                        @endforeach
                     


                        
                  
                    </table>
                 
                <div><button type="button" onclick="history.back()" class="button_back" name="back" value="back">戻る</button></div>
            </div>
        </div>
    </div>
</div>
@endsection