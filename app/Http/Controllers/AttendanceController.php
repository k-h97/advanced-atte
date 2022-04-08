<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        // Attendanceの中で今日の自分のデータを取得する
        $user_id = Auth::user()->id;

        $now = Carbon::now();
        $date = $now->format('Y-m-d');

        $attendance = Attendance::where("user_id", $user_id)->where("date", $date)->first();

        $user_id1 = Auth::user()->id;

        $now1 = Carbon::now();
        $date1 = $now1->format('Y-m-d');

        $rest = Attendance::where("user_id", $user_id1)->where("date", $date1)->first();

        $can_atte_start = true;
        $can_atte_end = false;

        $can_rest_start = false;
        $can_rest_end = false;


        if ($attendance) {
            $atte_start_time = $attendance->start_time;
            $atte_end_time = $attendance->end_time;

            if ($atte_start_time) {
                $can_atte_start = false;
            }

            if ($atte_start_time && !$atte_end_time) {
                $can_atte_end = true;
            }
        }

        if ($rest) {
            $rest_start_time = $rest->start_time1;
            $rest_end_time = $rest->end_time1;

            if ($atte_start_time) {
                $can_rest_start = true;
            }

            if ($rest_start_time && !$rest_end_time) {
                $can_rest_start = false;
                $can_rest_end = true;
            }
        }

        return view("stamp", [
            'can_atte_start' => $can_atte_start,
            'can_atte_end' => $can_atte_end,
            'can_rest_start' => $can_rest_start,
            'can_rest_end' => $can_rest_end
        ]);
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
