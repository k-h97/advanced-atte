@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/stamp.css">
@endsection

@section('content')
<div class="stamp">
    <div class="stamp-ttl">
        <p>{{ Auth::user()->name }}さんお疲れ様です!</p>
    </div>
    <div class="stamp-button">
        <form class="button-item" action="/attendance/start" method="post">
            @csrf
            <button class="str-attendance" type="submit">勤務開始</button>
        </form>
        <form class="button-item" action="/attendance/end" method="post">
            @csrf
            <button class="fin-attendance" type="submit">勤務終了</button>
        </form>
        <br>
        <form class="button-item" action="/rest/start" method="post">
            @csrf
            <button class="str-rest" type="submit">休憩開始</button>
        </form>
        <form class="button-item" action="/rest/end" method="post">
            @csrf
            <button class="fin-rest" type="button">休憩終了</button>
        </form>
    </div>
</div>
@endsection