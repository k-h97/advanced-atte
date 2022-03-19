@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/date.css">
@endsection

@section('content')
<div class="date">
    <div class="date-ttl">
        <p>2021-11-01</p>
    </div>
    <table class="table">
        <tr class="table-list">
            <th class="table-item">名前</th>
            <th class="table-item">勤務開始</th>
            <th class="table-item">勤務終了</th>
            <th class="table-item">休憩時間</th>
            <th class="table-item">勤務時間</th>
        </tr>

        <tr>
            <td>
            </td>
        </tr>
    </table>
@endsection
