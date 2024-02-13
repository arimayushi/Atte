<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\Timestamp;
// use Illuminate\Support\Facades\Auth;

class TimestampsController extends Controller
{
    public function punchIn()
    {
        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->punchIn = Carbon::now();
        $timestamp->punchOut = null;
        $timestamp->breakBegin = null;
        $timestamp->breakEnd = null;
        $timestamp->save();

        return back();

        // $user = Auth::user();
        // **
        // * 打刻は1日一回までにしたい
        // * DB
        // *
        // $oldTimestamp = Timestamp::where('user_id', $user->id)->first();
        // if ($oldTimestamp) {
        //     $oldTimestampPunchIn = new Carbon($oldTimestamp->punchIn);
        //     $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
        // }

        // $newTimestampDay = Carbon::today();

        // **
        // * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
        // *
        // if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
        //     return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        // }

        // $timestamp = Timestamp::create([
        //     'user_id' => $user->id,
        //     'punchIn' => Carbon::now(),
        // ]);

        // return redirect()->back()->with('my_status', '出勤打刻が完了しました');
    }

    public function punchOut()
    {
        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->punchOut = Carbon::now();
        $timestamp->punchIn = null;
        $timestamp->breakBegin = null;
        $timestamp->breakEnd = null;
        $timestamp->save();

        return back();

        // $user = Auth::user();
        // $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        // if( !empty($timestamp->punchOut)) {
        //     return redirect()->back()->with('error', '既に退勤の打刻がされているか、出勤打刻されていません');
        // }
        // $timestamp->update([
        //     'punchOut' => Carbon::now()
        // ]);

        // return redirect()->back()->with('my_status', '退勤打刻が完了しました');
    }

    public function breakBegin()
    {
        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->breakBegin = Carbon::now();
        $timestamp->breakEnd = null;
        $timestamp->punchIn = null;
        $timestamp->punchOut = null;
        $timestamp->save();

        return back();

        // $user = Auth::user();

        // $oldTimestamp = Timestamp::where('user_id', $user->id)->first();
        // if ($oldTimestamp) {
        //     $oldTimestampBreakBegin = new Carbon($oldTimestamp->breakBegin);
        // }
        // if ( empty($oldTimestamp->breakBegin)) {
        //     return redirect()->back()->with('error', 'すでに休憩開始打刻がされています');
        // }
        // $timestamp = Timestamp::create([
        //     'user_id' => $user->id,
        //     'breakBegin' => Carbon::now(),
        // ]);

        // return redirect()->back()->with('my_status', '休憩開始打刻が完了しました');
    }

    public function breakEnd()
    {

        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->breakEnd = Carbon::now();
        $timestamp->breakBegin = null;
        $timestamp->punchIn = null;
        $timestamp->punchOut = null;
        $timestamp->save();

        return back();

        // $user = Auth::user();

        // $timestamp = Timestamp::where('user_id', $user->id)->latest()->first();

        // if( !empty($timestamp->breakEnd)) {
        //     return redirect()->back()->with('error', '既に休憩終了の打刻がされているか、休憩開始打刻されていません');
        // }
        // $timestamp->update([
        //     'breakEnd' => Carbon::now()
        // ]);

        // return redirect()->back()->with('my_status', '休憩終了打刻が完了しました');
    }
}

