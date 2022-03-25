<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        return view("stamp");
    }

    public function start()
    {
        // user_idを用意する
        $user_id = Auth::user()->id;
        // dateを用意する（今日の日付を用意する）
        $now = Carbon::now();
        $date = $now->format('Y-m-d');
        // start_timeを用意する
        $start_time = $now->format('H:i:s');
        // attendancesテーブルに上記3つを保存する
        Attendance::create([
            "user_id" => $user_id,
            "date" => $date,
            "start_time" => $start_time
        ]);
        // リダイレクト
        return redirect("/");
    }

    public function end()
    {
        // user_idを用意する
        $user_id = Auth::user()->id;
        // dateを用意する（今日の日付を用意する）
        $now = Carbon::now();
        $date = $now->format('Y-m-d');
        // end_timeを用意する
        $end_time = $now->format('H:i:s');
        // attendancesから該当の値を取得する
        $attendance = Attendance::where("user_id", $user_id)->where("date", $date)->first();
        // attendancesを更新する
        $attendance->update([
            "end_time" => $end_time
        ]);

        // リダイレクト
        return redirect("/");
    }
}
