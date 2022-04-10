@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/date.css">
@endsection

@section('content')
<div class="date">
    <div class="date-ttl">
        <p>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
    </div>
    <table class="table">
        <tr class="table-list">
            <th class="table-item">名前</th>
            <th class="table-item">勤務開始</th>
            <th class="table-item">勤務終了</th>
            <th class="table-item">休憩時間</th>
            <th class="table-item">勤務時間</th>
        </tr>
        @foreach ($attendanceList as $attendance)
        <tr>
            <td>{{ $attendance['username'] }}</td>
            <td>{{ $attendance['attendance']->start_time }}</td>
            <td>{{ $attendance['attendance']->end_time }}</td>
            <td></td>
            <td></td>
        </tr>
        @endforeach
    </table>
@endsection
