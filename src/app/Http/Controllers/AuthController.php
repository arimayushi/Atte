<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use App\Models\Employee;
use App\Models\User;
use App\Models\Timestamp;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class AuthController extends Controller
{
    public function punchIn(Request $request)
    {
        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->punchIn = Carbon::now();
        $timestamp->punchOut = null;
        $timestamp->breakBegin = null;
        $timestamp->breakEnd = null;
        $timestamp->save(['user_id'=>auth()->user()->id,
        'punchIn'=>now(),
        ]);

        return back();
    }

    public function punchOut(Request $request)
    {
        $timestamp = new Timestamp;
        $timestamp->user_id = Auth::id();
        $timestamp->punchOut = Carbon::now();
        $timestamp->punchIn = null;
        $timestamp->breakBegin = null;
        $timestamp->breakEnd = null;
        $timestamp->save();

        $timestamp = Timestamp::where('punchOut')->latest()->first();

        if($timestamp){
            $timestamp->update(['punchOut'=>now()]);
        }
        return back();
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
    }

    public function index(Request $request)
    {
        // Log::Debug(__CLASS__.':'.__FUNCTION__);

        // $user = User::Paginate(5);

        // $todayTimestamp = date('Y-m-d');
        // $todayTimestamp = Carbon::today()->format('Y-m-d');
        // dd($todayTimestamp);
        // $timestamp = Timestamp::whereDate('punchIn' , '=' , $todayTimestamp)->where('user_id' , '=' , Auth::id())->first();
        // $timestamp->save();
        // $timestamp->user_id = Auth::id();
        // $timestamp = Timestamp::all();
        // "データを取ってくる crud処理 laravel基礎編 0-13から0-17"
        // "勤務開始のレコードを取得する"
        // $punchIn = Carbon::now();
        // $timestamp->punchIn = $punchIn;

        $user = Auth::user();
        $existTimestamp = false;
        foreach($user->timestamp as $timestamp)
            $ts = Carbon::parse($timestamp->created_at);
        if($ts->toDateString() == now()->toDateString()){
            $existTimestamp = true;
        // * 打刻は1日一回までにしたい
        // * DB
        // *
        $oldTimestamp = Timestamp::where('user_id', $user->id)->first();
        if ($oldTimestamp) {
            $oldTimestampPunchIn = new Carbon($oldTimestamp->punchIn);
            $oldTimestampDay = $oldTimestampPunchIn->startOfDay();
        }

        $newTimestampDay = Carbon::today();

        // **
        // * 日付を比較する。同日付の出勤打刻で、かつ直前のTimestampの退勤打刻がされていない場合エラーを吐き出す。
        // *
        if (($oldTimestampDay == $newTimestampDay) && (empty($oldTimestamp->punchOut))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

            if ( !empty($existTimestamp->punchIn)){
                $existTimestamp->punchOut = true;
                $existTimestamp->breakBegin = true;
            }
            if ( !empty($existTimestamp->breakBegin)){
                $existTimestamp->breakEnd = true;
            }
        }

        return view('index', compact('existTimestamp'));
    }

    public function attendance()
    {
        // Log::Debug(__CLASS__.':'.__FUNCTION__);
        // $users = Auth::user();
        // $user = User::find(')' , $timestamps);
        // $timestamps = $user->timestamp()->paginate(30);
        $user = Auth::user();
        return view('attendance', ['user' => $user]);
        // , [
        //     // 'users' => $users,
        //     // 'timestamp' => $timestamp,
        // ]);
    }
}