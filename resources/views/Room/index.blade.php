
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">会議室屋一覧</div>

                <div class="panel-body">
                    <table class="room">
                        <tr>
                            <th class="name">会議室名</th>
                            <th class="price">利用可能人数</th>


                     
                        
                        </tr>
                    @foreach ($roomLists as $list)
                        <tr>
                            <td class="name">{{ $list->name }}</td>
                            <td class="price">{{ $list->price }}</td>
 
                            <td class="command"></td>

                            </td>
                        </tr>
                    @endforeach
                    </table>
                    
                </div>
                <div></div>
            </div>
        </div>
    </div>
</div>
@endsection