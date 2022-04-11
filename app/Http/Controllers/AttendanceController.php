<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Rest;
use App\Models\User;
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

            $rest = Rest::where('attendance_id', $attendance->id)->latest()->first();

            if ($rest) {
                $rest_start_time = $rest->start_time;
                $rest_end_time = $rest->end_time;

                // 休憩終了直後
                if ($atte_start_time && !$atte_end_time && $rest_end_time) {
                    $can_rest_start = true;
                }

                if (!$atte_end_time && $rest_start_time && !$rest_end_time) {
                    $can_rest_end = true;
                    $can_atte_end = false;
                }
            } else {
                // 勤務開始直後
                if ($atte_start_time && !$atte_end_time) {
                    $can_rest_start = true;
                }
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

    public function date()
    {
        // dateを用意する（今日の日付を用意する）
        $now = Carbon::now();
        $date = $now->format('Y-m-d');

        $attendances = Attendance::where("date", $date)->get();

        $attendanceList = [];

        foreach ($attendances as $index => $attendance) {
            $user = User::where('id', $attendance->user_id)->first();

            $attendanceList[$index]['attendance'] = $attendance;
            $attendanceList[$index]['username'] = $user->name;

            // $attendanceに紐づいた休憩を取得する

            // 休憩をforeachで分解する

            // 終了時刻と開始時刻の差を計算する（秒で比較する）

            // それぞれの計算結果を合計する

            // 時：分：秒に直す
        }

        return view('date', ['attendanceList' => $attendanceList]);
    }
}
