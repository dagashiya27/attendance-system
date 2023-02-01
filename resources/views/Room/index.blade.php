
@extends('layouts.app')

@section('content')

<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- 日本語化する場合は下記を追記 -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>

<link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card roomCard">
                <div class="card-header">{{ __('会議室予約') }}</div>

                    <form method="POST" action="{{ route('room.confirm') }}">
                    @CSRF

                    <label id="roomLabel">会議室</label><br>
                    <select name="room-pullDown"id="room" type="text"value="{{ old('name') }}">
                        <option value="1">部屋1</option>
                        <option value="2">部屋2</option>  
                        <option value="3">部屋3</option> 
                    </select></br>

                
                <div>
                    <label id="roomLabel">開始日時</label>
                    <input id="start_time" type="text"value="{{ old('start_time') }}" >
                   
                    <script>
                    flatpickr("#start_time",{
                        locale: "ja",
                        dateFormat  : 'Y.m.d（D）H:i',
                        enableTime: true,
                        minTime     : '10:00',
                        maxTime     : '20:00',
                    });
                    
                
                    </script>
                    @if ($errors->has('start_time'))
                        <p class="error-message">{{ $errors->first('start_time') }}</p>
                    @endif<br>
                </div>
                <div>
                    <label id="roomLabel">終了日時</label>
                    <input id="finish_time" type="text"value="{{ old('finish_time') }}" >
        
                    <script>
                    flatpickr("#finish_time",{
                        locale: "ja",
                        dateFormat  : 'Y.m.d（D）H:i',
                        enableTime: true,
                        minTime     : '10:00',
                        maxTime     : '20:00',
                        
                           
                    });
                    
                    </script>
                    @if ($errors->has('finish_time'))
                        <p class="error-message">{{ $errors->first('finish_time') }}</p>
                    @endif<br>
                </div>   
                <div>
                    <label id="roomLabel">利用人数</label><br>
                    <input
                        id="people"
                        value="{{ old('people') }}"
                        type="text">人
                    @if ($errors->has('people'))
                        <p class="error-message">{{ $errors->first('people') }}</p>
                    @endif<br>
                </div>
                <div>
                    <label id="roomLabel">備考</label><br>
                    <textarea id="roomRemarks">{{ old('remarks') }}</textarea>
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                </div>
                    <button id="reserveButton" type="submit">入力内容確認</button>
                </form>


                </div>
        </div>
    </div>
</div>

                    
                    
                </div>
                <div></div>
            </div>
        </div>
    </div>
</div>
@endsection