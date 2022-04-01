<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        //"attendance_id",
        "user_id",
        "date",
        "start_time",
        "end_time"
    ];

    //public function attendance(){
        //return $this->belongsTo('App\Attendance');
    //}
}