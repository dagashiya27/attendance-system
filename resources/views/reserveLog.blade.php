
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">会議室予約履歴</div>

                <div class="panel-body">
                    <table class="room">
                        <tr>
                            <th class="name">名前</th>
                            <th class="price">住所</th>
                            <th class="name">名前</th>
                            <th class="price">住所</th>
                            <th class="name">名前</th>
                            <th class="price">住所</th>
                            <th class="command">編集</th>
                            <th class="command">削除</th>
                        </tr>
                  
                        <tr>
                           </td>
                        </tr>
                  
                    </table>
                   
                </div>
               
                <div><button type="button" onclick="history.back()" class="button_back" name="back" value="back">戻る</button></div>
            </div>
        </div>
    </div>
</div>
@endsection