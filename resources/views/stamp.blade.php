@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/stamp.css">
@endsection

@section('content')
<div class="stamp">
    <div class="stamp-ttl">
        <p>さんお疲れ様です!</p>
    </div>
    <div class="stamp-button">
        <button class="str-attendance" type="button">勤務開始</button>
        <button class="fin-attendance" type="button">勤務終了</button>
        <br>
        <button class="str-rest" type="button">休憩開始</button>
        <button class="fin-rest" type="button">休憩終了</button>
    </div>
</div>
@endsection
