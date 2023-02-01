
@extends('layouts.appAdmin')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ユーザ一覧</div>

                <div class="panel-body">
                    <table class="room">
                        
                        <tr>
                            
                            <th class="">個別ID</th>
                            <th class="">所属</th>
                            <th class="">名前</th>
                            <th class="">備考</th>
                            <th class="command"></th>
                            <th class="command"></th>
                        </tr>
                   @foreach($user as $detail)
                 
                   
                        <tr>
                         
                            <td>{{$detail->id}}</td>
                            <td>{{$detail->affiliation}}</td>
                            <td>{{$detail->name}}</td>
                            <td>{!! nl2br(htmlspecialchars($detail->remarks)) !!}</td>
                            <td><a href="/Admin/AdminUserEdit?id={{$detail->id}}"><button  id="userButton" type="submit" class="db_link">編集</button></a></td>
                            <td><a href="/delete?id={{$detail->id}}"><button type="submit" id="userButton"class="db_link" onclick="return confirm('本当に削除しますか？')">削除</button></a></td>
                        </tr>



                     
                        @endforeach
                     


                        
                  
                    </table>
                 
                <div id="backButtonDiv"> <a class="" id="backButton" href="{{ url('admin/home')  }}">
                    {{ __('トップへ戻る') }}
                </a>     </div>
            </div>
        </div>
    </div>
</div>
@endsection