<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    public function start()
    {
        // attendanceの中で自分のかつ今日のものを取ってくる
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $date = $now->format('Y-m-d');

        $attendance = Attendance::where("user_id", $user_id)->where("date", $date)->first();

        // 現在の時刻を取得する
        $start_time = $now->format('H:i:s');

        Rest::create([
            "attendance_id" => $attendance->id,
            "start_time" => $start_time
        ]);
        // リダイレクト
        return redirect("/");
    }

    public function end()
    {
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $date = $now->format('Y-m-d');

        $attendance = Attendance::where("user_id", $user_id)->where("date", $date)->first();

        $rest = Rest::where("attendance_id", $attendance->id)->first();

        $end_time = $now->format('H:i:s');

        $rest->update([
            "end_time" => $end_time
        ]);

        // リダイレクト
        return redirect("/");
    }
}
