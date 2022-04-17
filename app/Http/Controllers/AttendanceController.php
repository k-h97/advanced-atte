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
            $rests = Rest::where('attendance_id', $attendance->id)->get();

            $rest_sum = 0;
            // 休憩をforeachで分解する
            foreach ($rests as $rest) {
                // 終了時刻と開始時刻の差を計算する（秒で比較する）
                $rest_start_time = new Carbon($rest->start_time);
                $rest_end_time = new Carbon($rest->end_time);

                $rest_diff = $rest_start_time ->diffInSeconds($rest_end_time);

                $rest_sum = $rest_sum + $rest_diff;
            }

            // 時：分：秒に直す
            $rest_h = floor($rest_sum / 3600);
            $rest_m = floor(($rest_sum / 60) % 60);
            $rest_s = $rest_sum % 60;

            $rest_hms = sprintf("%02d:%02d:%02d", $rest_h, $rest_m, $rest_s);

            $attendanceList[$index]['rest_hms'] = $rest_hms;

            $atte_start_time = new Carbon($attendance->start_time);
            $atte_end_time = new Carbon($attendance->end_time);

            $atte_diff = $atte_start_time ->diffInSeconds($atte_end_time);

            $atte_sum = $atte_diff - $rest_sum;

            // 時：分：秒に直す
            $atte_h = floor($atte_sum / 3600);
            $atte_m = floor(($atte_sum / 60) % 60);
            $atte_s = $atte_sum % 60;

            $atte_hms = sprintf("%02d:%02d:%02d", $atte_h, $atte_m, $atte_s);

            $attendanceList[$index]['atte_hms'] = $atte_hms;
        }

        return view('date', ['attendanceList' => $attendanceList]);
    }
}
