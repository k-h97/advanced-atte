<?php

namespace App\Http\Controllers;

use App\Models\Rest;
//use App\Controller\AttendanceController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestController extends Controller
{
    public function index()
    {
        return view("stamp");
    }

    public function start()
    {
        //$attendance_id = Rest::with('attendance')->get('AttendanceController','user_id');
        $user_id = Auth::user()->id;

        //$now =Rest::with('attendances')->where('date', '$date');
        //$date = $now->format('Y-m-d');
        $now = Carbon::now();
        $date = $now->format('Y-m-d');

        $start_time = $now->format('H:i:s');

        Rest::create([
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

        $end_time = $now->format('H:i:s');

        $rest = Rest::where("user_id", $user_id)->where("date", $date)->first();

        $rest->update([
            "end_time" => $end_time
        ]);

        // リダイレクト
        return redirect("/");
    }
}