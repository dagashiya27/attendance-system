@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">予約一覧</div>

                <div class="panel-body">
                    <detail-component></detail-component>
                    <div>{{ link_to('/management/create', '予約する', ['class' => 'btn']) }}</div>
                </div>
                @can('manager')
                <div>{{ link_to('/management/schedule', 'スケジュール', ['class' => 'btn']) }}</div>
                <div>{{ link_to('/management/total', '集計', ['class' => 'btn']) }}</div>
                <div>{{ link_to('/room', '部屋一覧へ', ['class' => 'btn']) }}</div>
                <div>{{ link_to('/management/checkout', '本日のチェックアウト', ['class' => 'btn']) }}</div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection