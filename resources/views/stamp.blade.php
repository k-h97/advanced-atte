@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/stamp.css">
@endsection

@section('content')
<div class="stamp">
    <div class="stamp-ttl">
        <p>{{ Auth::user()->name }}さんお疲れ様です!</p>
    </div>
    <div class="stamp-button-list">
        <div class="stamp-button-flex">
            @if($can_atte_start)
            <form class="button-item" action="/attendance/start" method="post">
                @csrf
                <button class="stamp-button" type="submit">勤務開始</button>
            </form>
            @else
            <div class="stamp-text">勤務開始</div>
            @endif

            @if($can_atte_end)
            <form class="button-item" action="/attendance/end" method="post">
                @csrf
                <button class="stamp-button" type="submit">勤務終了</button>
            </form>
            @else
            <div class="stamp-text">勤務終了</div>
            @endif
        </div>

        <div class="stamp-button-flex">
            @if($can_rest_start)
            <form class="button-item" action="/rest/start" method="post">
                @csrf
                <button class="stamp-button" type="submit">休憩開始</button>
            </form>
            @else
            <div class="stamp-text">休憩開始</div>
            @endif

            @if($can_rest_end)
            <form class="button-item" action="/rest/end" method="post">
                @csrf
                <button class="stamp-button" type="submit">休憩終了</button>
            </form>
            @else
            <div class="stamp-text">休憩終了</div>
            @endif
        </div>
    </div>
</div>
@endsection
